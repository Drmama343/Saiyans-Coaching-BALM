<?php 

namespace App\Controllers;

use App\Models\ArticleModel;
use CodeIgniter\Controller;
use App\Models\SaiyanModel;

class BlogController extends Controller
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}

	public function index()
	{
		
		$articleModel = new ArticleModel();
		$saiyanModel = new SaiyanModel;

		$articles = $articleModel->findByType('blog');
		foreach ($articles as $key => $article) {
			$articles[$key]['saiyan'] = $saiyanModel->find($article['auteur']);
		}

		$data = [
			'articles' => $articles,
		];
		$this->session->set('page', 'blog');
		return view('blog', $data);
	}
}