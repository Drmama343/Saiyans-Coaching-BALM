<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgrammeModel extends Model {
	protected $table = 'produit';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nom', 'description', 'prix', 'duree', 'entrainement', 'multimedia', 'alimentaire', 'bilan', 'whatsapp'];

	public function getPaginatedProgrammes($perPage = 5) { 
		return $this->paginate($perPage, 'Programme');
	}
	public function getPaginatedProgrammesRecherche($recherche, $perPage = 5) {
		if (is_numeric($recherche)) {
			return $this->groupStart()
						->where('prix', $recherche)
						->orWhere('duree', $recherche)
						->orLike('nom', $recherche)
						->groupEnd()
						->paginate($perPage, 'Programme');
		} else {
			// Recherche non numérique
			return $this->groupStart()
						->like('nom', $recherche)
						->groupEnd()
						->paginate($perPage, 'Programme'); 
		}
	}
}