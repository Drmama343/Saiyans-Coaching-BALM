<?php

namespace App\Controllers;

use App\Models\QuestionModel;
use App\Models\SaiyanModel;
use App\Models\AchatModel;
use App\Models\ProduitModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class QuestionAdminController extends BaseController
{
    protected $session;
    public function __construct() {
        helper('form');
        $this->session = session();
    }

    public function index(){
        $model = new QuestionModel();
        $data['questions'] = $model->getPaginatedQuestion();
        $data['pagerQuestions'] = $model->pager;
        return view('questionsadmin', $data);
    }

    public function modifierQuestion ($idQuestion){
        $model = new QuestionModel();

        $questionChange = [
			'id' => $idQuestion,
			'question' => $this->request->getVar('question'),
			'reponse' => $this->request->getVar('reponse'),
        ];

        $model->update($idQuestion, $questionChange);

        return redirect()->to('/questionadmin')->with('success', 'Question modifié avec succès');
    }

    public function supprimerQuestion ($idQuestion){
        $model = new QuestionModel();

        $model->delete($idQuestion);

        return redirect()->to('/questionadmin')->with('success', 'Question supprimé avec succès');
    }

    public function creerQuestion (){
        $model = new QuestionModel();

        $newQuestion = [
			'question' => $this->request->getVar('question'),
			'reponse' => $this->request->getVar('reponse'),
        ];

        $model->insert($newQuestion);

        return redirect()->to('/questionadmin')->with('success', 'Question ajouté avec succès');
    }
}