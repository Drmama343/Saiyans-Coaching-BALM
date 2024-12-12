<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model {
	protected $table = 'achat';

	protected $primaryKey = 'id';
	protected $allowedFields = ['idsaiyan', 'idproduit', 'date', 'echeance'];

	public function getPaginatedAchats($perPage = 8) { 
        return $this->paginate($perPage, 'Achat');
    }
    public function getPaginatedAchatsRecherche($recherche, $perPage = 8) {
        return $this->groupStart()
            ->where("CAST(date AS TEXT) LIKE", "%{$recherche}%")
			->orWhere("CAST(echeance AS TEXT) LIKE", "%{$recherche}%")
            ->groupEnd()
            ->paginate($perPage, 'Achat');
    }
}