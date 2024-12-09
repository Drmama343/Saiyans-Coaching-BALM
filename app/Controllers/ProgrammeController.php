<?php

namespace App\Controllers;

use App\Models\ProgrammeModel;
use App\Models\TemoignageModel;

class ProgrammeController extends BaseController
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}

	public function index(): string
	{
		$programmeModel = new ProgrammeModel();
		$temoignageModel = new TemoignageModel();

		$produits = $programmeModel->findAll();
		$temoignages = $temoignageModel->find();
		$data['produits'] = $produits;
		$data['temoignage'] = $temoignages;
		
		return view('programme', $data);
	}
}