<?php

namespace App\Controllers;

use App\Models\SaiyanModel;
use App\Models\AchatModel;
use App\Models\ProduitModel;
use App\Models\ArticleModel;


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

		//var_dump($age);
		//exit;

		$data = [
			'sexe' => $sexe,
			'age' => $age,
			'poids' => $poids,
			'taille' => $taille,
		];

		return view('admin/admin', $data);
	}

	public function article()
	{
		$articleModel = new ArticleModel();
		$articles = $articleModel->findAll();

		$data = [
			'articles' => $articles,
		];

		return view('admin/article', $data);
	}
}