<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MediaModel;

class AvantApresController extends Controller
{
	protected $session;
	public function __construct() {
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
}