<?php

namespace App\Controllers;

use App\Models\AbonnementModel;
use App\Models\AvisModel;

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
		$abonnementModel = new AbonnementModel();
		$avisModel = new AvisModel();

		$abonnements = $abonnementModel->findAll();
		$avis = $avisModel->findAll();
		$data['abonnements'] = $abonnements;
		$data['avis'] = $avis;

		return view('index', $data);
	}
}