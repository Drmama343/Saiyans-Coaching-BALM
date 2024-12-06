<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\TemoignageModel;
use App\Models\SaiyanModel;

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
		$saiyanModel = new SaiyanModel();

		$produits = $produitModel->orderBy('prix', 'ASC')->findAll();
		$temoignages = $temoignageModel->find();
		$data['produits'] = $produits;
		
		foreach ($temoignages as $key => $temoignage) {
			$temoignages[$key]['saiyan'] = $saiyanModel->find($temoignage['idsaiyan']);
		}
		
		$data['temoignages'] = $temoignages;

		return view('index', $data);
	}
}