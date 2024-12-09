<?php

namespace App\Controllers;

use App\Models\SaiyanModel;
use App\Models\AchatModel;
use App\Models\ProgrammeModel;
use App\Models\ArticleModel;
use App\Models\QuestionModel;
use App\Models\PromotionModel;


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

	public function programme()
	{
		$programmeModel = new ProgrammeModel();
		$promotionModel = new PromotionModel();
		$programmes = $programmeModel->findAll();
		$promotions = $promotionModel->findAll();

		foreach ($promotions as $key => $promotion) {
			$promotions[$key]['programme'] = $programmeModel->find($promotion['produit']);
		}

		$data = [
			'programmes' => $programmes,
			'promotions' => $promotions,
		];

		return view('admin/programme', $data);
	}

	public function ajoutProgramme()
	{
		// Récupérer les données du formulaire
		$data = [
			'nom' => $this->request->getPost('nom'),
			'description' => $this->request->getPost('description'),
			'prix' => $this->request->getPost('prix'),
			'duree' => $this->request->getPost('duree'),
			'photo' => $this->request->getFile('image') ? $this->request->getFile('image')->getName() : null // Gérer l'upload d'image
		];

		// Insérer dans la base de données
		$programmeModel = new ProgrammeModel();
		$programmeModel->insert($data);

		// Déplacer l'image si elle existe
		if ($this->request->getFile('image')->isValid()) {
			$this->request->getFile('image')->move(WRITEPATH . 'uploads/');
		}

		// Rediriger vers la liste des programmes
		return redirect()->to('/admin/programme');
	}

	public function modifProgramme($id)
	{
		$programmeModel = new ProgrammeModel();
		$programme = $programmeModel->find($id);
	
		// Vérifier si une image est téléchargée
		$photo = $programme['photo']; // Conserver l'ancienne image par défaut
		$imageFile = $this->request->getFile('image');

		if ($imageFile->isValid()) {
			// Si une nouvelle image est téléchargée, traiter le fichier
			$photo = $imageFile->getName();
			$imageFile->move(WRITEPATH . 'uploads/');
		}

		// Récupérer les autres données du formulaire
		$data = [
			'nom' => $this->request->getPost('nom'),
			'description' => $this->request->getPost('description'),
			'prix' => $this->request->getPost('prix'),
			'duree' => $this->request->getPost('duree'),
			'photo' => $photo
		];

		// Mettre à jour le programme dans la base de données
		$programmeModel->update($id, $data);

		// Rediriger vers la liste des programmes
		return redirect()->to('/admin/programme');
	}


	public function supprProgramme($id)
	{
		$programmeModel = new ProgrammeModel();
		$programme = $programmeModel->find($id);

		// Vérifier si le programme existe
		if ($programme) {
			// Supprimer l'image associée (si elle existe)
			if (file_exists(WRITEPATH . 'uploads/' . $programme['photo'])) {
				unlink(WRITEPATH . 'uploads/' . $programme['photo']);
			}

			// Supprimer le programme de la base de données
			$programmeModel->delete($id);
		}

		// Rediriger vers la liste des programmes
		return redirect()->to('/admin/programme');
	}


	public function ajoutPromotion()
	{
		// Récupérer les données du formulaire
		$data = [
			'date_deb' => $this->request->getPost('date_deb'),
			'date_fin' => $this->request->getPost('date_fin'),
			'reduction' => $this->request->getPost('reduction'),
			'code' => $this->request->getPost('code'),
			'nb_utilisation' => $this->request->getPost('nb_utilisation'),
			'produit' => $this->request->getPost('produit')
		];

		// Insérer dans la base de données
		$promotionModel = new PromotionModel();
		$promotionModel->insert($data);

		return redirect()->to('/admin/programme');
	}

	public function modifPromotion($id)
	{
		$promotionModel = new PromotionModel();

		$data = [
			'date_deb' => $this->request->getPost('date_deb'),
			'date_fin' => $this->request->getPost('date_fin'),
			'reduction' => $this->request->getPost('reduction'),
			'code' => $this->request->getPost('code'),
			'nb_utilisation' => $this->request->getPost('nb_utilisation'),
			'produit' => $this->request->getPost('produit')
		];

		$promotionModel->update($id, $data);
		return redirect()->to('/admin/promotion');
	}

	public function supprPromotion($id)
	{
		$promotionModel = new PromotionModel();
		$promotionModel->delete($id);

		return redirect()->to('/admin/programme');
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

		return redirect()->to('admin/question')->with('success', 'Question modifié avec succès');
	}

	public function supprimerQuestion ($idQuestion){
		$model = new QuestionModel();

		$model->delete($idQuestion);

		return redirect()->to('admin/question')->with('success', 'Question supprimé avec succès');
	}

	public function creerQuestion (){
		$model = new QuestionModel();

		$newQuestion = [
			'question' => $this->request->getVar('question'),
			'reponse' => $this->request->getVar('reponse'),
		];

		$model->insert($newQuestion);

		return redirect()->to('admin/question')->with('success', 'Question ajouté avec succès');
	}

	public function saiyan(){
		$model = new SaiyanModel();
		$data['saiyans'] = $model->getPaginatedSaiyans(10);
		$data['pagerSaiyan'] = $model->pager;

		return view('admin/saiyan', $data);
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