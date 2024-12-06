<?php 

namespace App\Controllers;

use App\Models\ArticleModel;

class ActualiteController extends BaseController {
	public function index() {
		$articleModel = new ArticleModel();
		$data = [
			'articles' => $articleModel->findByType('actu')
		];
		
		return view('actualite', $data);
	}
}