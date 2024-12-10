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
		$temoignageModel = new TemoignageModel;

		$temoignages = $temoignageModel->findByAffichageImage(); // A changer en 'photo'

		$data = [
			'temoignages' => $temoignages,
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

				// Vérifier si le fichier est une image
				$imageType = exif_imagetype($_FILES['image']['tmp_name']);
				if (in_array($imageType, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF])) {
			
					// Charger l'image selon son type
					switch ($imageType) {
						case IMAGETYPE_JPEG:
							$image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
							break;
						case IMAGETYPE_PNG:
							$image = imagecreatefrompng($_FILES['image']['tmp_name']);
							break;
						case IMAGETYPE_GIF:
							$image = imagecreatefromgif($_FILES['image']['tmp_name']);
							break;
					}
			
					// Dimensions maximales
					$maxWidth = 600;
					$maxHeight = 600;
			
					// Obtenir les dimensions de l'image originale
					list($originalWidth, $originalHeight) = getimagesize($_FILES['image']['tmp_name']);
			
					// Calculer le ratio de redimensionnement
					$ratio = min($maxWidth / $originalWidth, $maxHeight / $originalHeight);
			
					// Nouvelles dimensions
					$newWidth = floor($originalWidth * $ratio);
					$newHeight = floor($originalHeight * $ratio);
			
					// Créer une image vide avec les nouvelles dimensions
					$newImage = imagecreatetruecolor($newWidth, $newHeight);
			
					// Conserver la transparence pour PNG et GIF
					if ($imageType == IMAGETYPE_PNG || $imageType == IMAGETYPE_GIF) {
						imagealphablending($newImage, false);
						imagesavealpha($newImage, true);
					}
			
					// Redimensionner l'image
					imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
			
					// Nom unique pour éviter les collisions
					$newFileName = uniqid('avtapr' . $idSaiyan . '_', true) . image_type_to_extension($imageType);
					$newPathFilename = $destinationPath . '/' . $newFileName;
			
					// Sauvegarder l'image redimensionnée
					switch ($imageType) {
						case IMAGETYPE_JPEG:
							imagejpeg($newImage, $newPathFilename, 90); // Compression pour JPEG
							break;
						case IMAGETYPE_PNG:
							imagepng($newImage, $newPathFilename);
							break;
						case IMAGETYPE_GIF:
							imagegif($newImage, $newPathFilename);
							break;
					}
			
					// Libérer la mémoire
					imagedestroy($image);
					imagedestroy($newImage);
				} else {
					return redirect()->back()->with('error', 'L\'extension du fichier n\'est pas accépté.');
				}
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
			'image' => isset($newFileName) ? $newFileName : null,
			'affichage' => false,
		];

		$model->insert($t);

		return redirect('avant-apres');
	}
}