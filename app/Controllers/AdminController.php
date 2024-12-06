<?php

namespace App\Controllers;

use App\Models\SaiyanModel;

class AdminController extends BaseController
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}


	public function index()
	{
		$saiyanModel = new SaiyanModel();

		$sexe = $saiyanModel->sexe();
		$age = $saiyanModel->age();
		$poids = $saiyanModel->poids();
		$taille = $saiyanModel->taille();

		$saiyans = $saiyanModel->getPaginatedSaiyans();

		$data = [
			'sexe' => $sexe,
			'age' => $age,
			'poids' => $poids,
			'taille' => $taille,
			'saiyans' => $saiyans,
			'pagerSaiyans' => $saiyanModel->pager
		];

		return view('admin', $data);
	}
}