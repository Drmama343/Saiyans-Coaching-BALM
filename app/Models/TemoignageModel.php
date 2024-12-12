<?php

namespace App\Models;

use CodeIgniter\Model;

class TemoignageModel extends Model {
	protected $table = 'temoignage';
	protected $primaryKey = 'id';
	protected $allowedFields = ['idsaiyan','temoignage','note','date','image','affichage'];

	public function findByAffichage(): mixed {
		return $this->asArray()->where(['affichage' => 't'])->findAll();
	}

	public function findByAffichageImage(): mixed {
		return $this->asArray()->where(['affichage' => 't'])->where('image IS NOT NULL')->findAll();
	}

	public function getPaginatedTemoignages($perPage = 10) { 
		return $this->paginate($perPage, 'Temoignage');
	}

	public function getPaginatedTemoignagesRecherche($recherche, $perPage = 10) {
		if (is_numeric($recherche)) {
			return $this->groupStart()
				->where('note', $recherche)
				->orLike('temoignage', $recherche)
				->orWhere("CAST(date AS TEXT) LIKE", "%{$recherche}%")
				->groupEnd()
				->paginate($perPage, 'Temoignage');
		} else {
			// Recherche non numérique
			return $this->groupStart()
				->like('temoignage', $recherche)
				->orWhere("CAST(date AS TEXT) LIKE", "%{$recherche}%") 
				->groupEnd()
				->paginate($perPage, 'Temoignage'); 
		}
	}
}