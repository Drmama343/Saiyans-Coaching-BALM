<?php 

namespace App\Controllers;

use CodeIgniter\Controller;

class BlogController extends Controller
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}

	public function index()
	{
		/*
		$temoignageModel = new TemoignageModel;
		$saiyanModel = new SaiyanModel;

		$temoignages = $temoignageModel->findAll();
		foreach ($temoignages as $key => $temoignage) {
			$temoignages[$key]['saiyan'] = $saiyanModel->find($temoignage['id_saiyan']);
		}

		
		$data = [
			'temoignages' => $temoignages,
		];*/

		return view('blog', /*$data*/);
	}
}