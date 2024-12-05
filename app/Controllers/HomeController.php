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

		$produits = $produitModel->orderBy('prix', 'ASC')->findAll();
		$temoignages = $temoignageModel->findAll();
		$data['produits'] = $produits;
		$data['temoignages'] = $temoignages;

		return view('index', $data);
	}
}