<?php 

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\SaiyanModel;

class ActualiteController extends BaseController {

	protected $session;
	public function __construct() {
		$this->session = session();
	}
	public function index() {
		$articleModel = new ArticleModel();
		$saiyanModel = new SaiyanModel;

		$articles = $articleModel->findByType('actu');
		foreach ($articles as $key => $article) {
			$articles[$key]['saiyan'] = $saiyanModel->find($article['auteur']);
		}

		$data = [
			'articles' => $articles,
		];
		return view('actualite', $data);
	}
}