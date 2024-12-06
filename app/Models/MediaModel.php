<?php

namespace App\Models;

use CodeIgniter\Model;

class MediaModel extends Model {
	protected $table = 'media';
	protected $primaryKey = 'id';
	protected $allowedFields = ['titre','description','media','type', 'affichage'];

	
	public function findByType($type) {
		return $this->asArray()
					->where(['type' => $type])
					->where(['affichage' => 1])
					->findAll();
	}
}
