<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\TemoignageModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class HomeController extends BaseController
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}

	public function index(): string
	{
		$produitModel = new ProduitModel();
		$temoignageModel = new TemoignageModel();

		$offres = $produitModel->orderBy('prix', 'ASC')->findAll();
		$avis = $temoignageModel->findAll();
		$data['offres'] = $offres;
		$data['avis'] = $avis;

		return view('index', /*$data*/);
	}
}