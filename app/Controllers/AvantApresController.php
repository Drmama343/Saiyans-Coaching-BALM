<?php 

namespace App\Controllers;

use CodeIgniter\Controller;

class AvantApresController extends Controller
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}

	public function index()
	{
		/*$mediaModel = new MediaModel;

		$medias = $mediaModel->findByType('photo');

		$data = [
			'photos' => $medias['media'],
		];*/

		return view('avant-apres', /*$data*/);
	}
}