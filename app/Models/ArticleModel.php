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
}