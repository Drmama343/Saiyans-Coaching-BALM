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
		return view('admin/admin');
	}

	public function article()
	{
		$articleModel = new ArticleModel();
		$articles = $articleModel->findAll();
		$data['articles'] = $articles;

		return view('admin/article', $data);
	}
}