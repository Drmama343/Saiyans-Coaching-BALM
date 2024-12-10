<?php

namespace App\Models;

use CodeIgniter\Model;

class SaiyanModel extends Model {
	protected $table = 'saiyan';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nom', 'prenom', 'mail', 'mdp', 'adresse', 'tel', 'sexe', 'admin', 'age', 'taille', 'poids', 'reset_token', 'reset_token_expiration'];

	public function sexe() {
		return $this->select('sexe, COUNT(*) AS count')->groupBy('sexe')->get()->getResult();
	}

	public function age() {
		return $this->select('FLOOR(age / 10) * 10 AS tranche_age, COUNT(*) AS count')->groupBy('tranche_age')
					->orderBy('tranche_age')->get()->getResult();
	}
	
	public function poids() {
		return $this->select('FLOOR(poids / 10) * 10 AS tranche_poids, COUNT(*) AS count')->groupBy('tranche_poids')
					->orderBy('tranche_poids')->get()->getResult();
	}

	public function taille() {
		return $this->select('FLOOR(taille / 10) * 10 AS tranche_taille, COUNT(*) AS count')->groupBy('tranche_taille')
					->orderBy('tranche_taille')->get()->getResult();
	}

	public function getPaginatedSaiyans($perPage = 5) { 
		return $this->paginate($perPage, 'Saiyan');
	}

	public function getPaginatedSaiyansRecherche($recherche, $perPage = 5) {
		if (is_int($recherche)) {
			return $this->groupStart()
				->orLike('tel', $recherche)
				->orLike('poids', $recherche)
				->orLike('age', $recherche)
				->orLike('taille', $recherche)
				->groupEnd()
				->paginate($perPage, 'Saiyan');
		} 
		else {
			return $this->groupStart() 
				->like  ('nom', $recherche)
				->orLike('prenom', $recherche)
				->orLike('mail', $recherche)
				->orLike('tel', $recherche)
				->orLike('sexe', $recherche)
				->groupEnd()
				->paginate($perPage, 'Saiyan');
		}
	}
}