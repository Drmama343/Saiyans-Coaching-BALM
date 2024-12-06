<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\TemoignageModel;

class ProgrammeController extends BaseController
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}

	public function index(): string
	{
		$produitModel = new ProduitModel();
		$temoignageModel = new TemoignageModel();

		$produits = $produitModel->findAll();
		$temoignages = $temoignageModel->find();
		$data['produits'] = $produits;
		$data['temoignage'] = $temoignages;
		
		return view('programme', $data);
	}
}