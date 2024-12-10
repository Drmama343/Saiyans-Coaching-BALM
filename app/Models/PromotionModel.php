<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model {
	protected $table = 'promotion';
	protected $primaryKey = 'id';
	protected $allowedFields = ['date_deb', 'date_fin', 'reduction', 'code', 'nb_utilisation', 'produit'];

	public function getPaginatedPromotions($perPage = 2) { 
		return $this->paginate($perPage, 'Promotion');
	}
	public function getPaginatedPromotionsRecherche($recherche, $perPage = 2) {
		if (is_numeric($recherche)) {
			return $this->groupStart()
						->where('reduction', $recherche)
						->orWhere('code', $recherche)
						->orLike('nb_utilisation', $recherche)
						->orWhere("CAST(date_deb AS TEXT) LIKE", "%{$recherche}%")
						->orWhere("CAST(date_fin AS TEXT) LIKE", "%{$recherche}%")
						->groupEnd()
						->paginate($perPage, 'Promotion');
		} else {
			// Recherche non numérique
			return $this->groupStart()
						->where('code', $recherche)
						->orWhere("CAST(date_deb AS TEXT) LIKE", "%{$recherche}%")
						->orWhere("CAST(date_fin AS TEXT) LIKE", "%{$recherche}%")
						->groupEnd()
						->paginate($perPage, 'Promotion'); 
		}
	}
}