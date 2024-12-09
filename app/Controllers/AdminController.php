<?php

namespace App\Controllers;

use App\Models\SaiyanModel;
use App\Models\AchatModel;
use App\Models\ProduitModel;
use App\Models\ArticleModel;
use App\Models\QuestionModel;


class AdminController extends BaseController
{
	protected $session;
	public function __construct() {
		helper('form');
		$this->session = session();
	}

	public function index()
	{
		$saiyanModel = new SaiyanModel();

		$sexe = $saiyanModel->sexe();
		$age = $saiyanModel->age();
		$poids = $saiyanModel->poids();
		$taille = $saiyanModel->taille();

		$saiyans = $saiyanModel->getPaginatedSaiyans();

		$data = [
			'sexe' => $sexe,
			'age' => $age,
			'poids' => $poids,
			'taille' => $taille,
			'saiyans' => $saiyans,
			'pagerSaiyans' => $saiyanModel->pager
		];

		return view('admin/admin', $data);
	}

	public function question(){
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

	public function saiyan(){
        $model = new SaiyanModel();
        $data['saiyans'] = $model->getPaginatedSaiyans(10);
        $data['pagerSaiyan'] = $model->pager;
		return view('saiyansadmin', $data);
    }
	public function article()
	{
		$articleModel = new ArticleModel();
		$articles = $articleModel->findAll();

		$data = [
			'articles' => $articles,
		];

		return view('admin/article', $data);
	}

	public function modifier($model, $id) {
		
		$fichier = 'App\Models\\' . ucfirst($model) . 'Model';
		$fichier = new $fichier();
		$data = $fichier->find($id);

		$data = [
			'data' => $data,
			'model' => $model,
		];

		return view('admin/modifier', $data);
	}
}