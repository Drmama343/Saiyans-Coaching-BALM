<?php

namespace App\Models;

use CodeIgniter\Model;

class TemoignageModel extends Model {
	protected $table = 'temoignage';
	protected $primaryKey = 'id';
	protected $allowedFields = ['idsaiyan','temoignage','note','date','image','affichage'];

	public function find($id = null) {
		return $this->asArray()
					->where(['affichage' => 't'])
					->findAll();
	}
}