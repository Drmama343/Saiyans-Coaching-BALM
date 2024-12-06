<?php

namespace App\Models;

use CodeIgniter\Model;

class MediaModel extends Model {
	protected $table = 'media';
	protected $primaryKey = 'id';
	protected $allowedFields = ['titre','description','media','type'];

	
	public function findByType($type) {
		$builder = $this->db->table($this->table);
		$builder->where('type', $type);
		$query = $builder->get();
		return $query->getResultArray();
	}
}
