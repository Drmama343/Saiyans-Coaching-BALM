<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model {
	protected $table = 'question';
	protected $primaryKey = 'id';
	protected $allowedFields = ['question', 'reponse'];

    public function getPaginatedQuestion($perPage = 3) { 
        return $this->paginate($perPage, 'Question');
    }
}