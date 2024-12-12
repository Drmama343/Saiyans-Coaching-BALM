<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model {
	protected $table = 'article';
	protected $primaryKey = 'id';
	protected $allowedFields = ['titre', 'contenu', 'auteur', 'date_publi', 'image', 'type', 'affichage'];

	public function findByType($type) {
		return $this->where('type', $type)->findAll();
	}

	public function getPaginatedArticles($perPage = 5) { 
		return $this->paginate($perPage, 'Article');
	}

	public function getPaginatedArticlesRecherche($recherche, $perPage = 5) {
		return $this->groupStart()
			->like  ('titre', $recherche)
			->orLike('contenu', $recherche)
			->orLike('type', $recherche)
			->groupEnd()
			->paginate($perPage, 'Article');
	}
}