<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model {
	protected $table = 'question';
	protected $primaryKey = 'id';
	protected $allowedFields = ['question', 'reponse'];

    public function getPaginatedQuestions($perPage = 3) { 
        return $this->paginate($perPage, 'Question');
    }
    public function getPaginatedQuestionsRecherche($recherche, $perPage = 3) {
        return $this->groupStart()
            ->like('question', $recherche)
            ->orLike('reponse', $recherche)
            ->groupEnd()
            ->paginate($perPage, 'Question');
    }
}