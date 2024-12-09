<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MediaModel;
use App\Models\TemoignageModel;

class AvantApresController extends Controller
{
	protected $session;
	public function __construct() {
		helper("form");
		$this->session = session();
	}

	public function index()
	{
		$mediaModel = new MediaModel;

		$medias = $mediaModel->findByType('video'); // A changer en 'photo'

		$data = [
			'medias' => $medias,
		];

		return view('avant-apres', $data);
	}

	public function ajoutTemoignage($idSaiyan)
	{
		$model = new TemoignageModel;

		$file = $this->request->getFile('image');
		if ($file != null) {
			if ($file && $file->isValid() && !$file->hasMoved()) {
				$destinationPath = WRITEPATH .'../public/assets/images/temoignages';

				if (!is_dir($destinationPath)) {
					mkdir($destinationPath, 0755, true);
				}

				$newName = 'avtapr' . $idSaiyan . '_' . date('YmdHis').'.png';
				$file->move($destinationPath, $newName);
			} else {
				// Gérer les erreurs
				return redirect()->back()->with('error', 'Le fichier n\'est pas valide ou n\'a pas été téléchargé correctement.');
			}
		}

		$t = [
			'idsaiyan' => $idSaiyan,
			'temoignage' => $this->request->getVar(index: 'temoignage') == null ? null : $this->request->getVar(index: 'temoignage'),
			'note' => $this->request->getVar('note') == null ? null : $this->request->getVar('note'),
			'date' => date('Y-m-d'),
			'image' => isset($newName) ? $newName : null,
			'affichage' => false,
		];

		$model->insert($t);

		return redirect('avant-apres');
	}
}