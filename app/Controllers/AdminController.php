<?php

namespace App\Controllers;

use App\Models\SaiyanModel;
use App\Models\ProgrammeModel;
use App\Models\PromotionModel;
use App\Models\TemoignageModel;
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

	public function saiyan(){
		$model = new SaiyanModel();
		$data['saiyans'] = $model->getPaginatedSaiyans(10);
		$data['pagerSaiyan'] = $model->pager;

		return view('admin/saiyan', $data);
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
		$produitsSelectionnes = $this->request->getPost('paramProgramme');

		$entrainement = in_array('entrainement', $produitsSelectionnes) ? true : false;
		$multimedia = in_array('multimedia', $produitsSelectionnes) ? true : false;
		$alimentaire = in_array('alimentaire', $produitsSelectionnes) ? true : false;
		$bilan = in_array('bilan', $produitsSelectionnes) ? true : false;
		$whatsapp = in_array('whatsapp', $produitsSelectionnes) ? true : false;

		// Récupérer les données du formulaire
		$data = [
			'nom' => $this->request->getPost('nom'),
			'description' => $this->request->getPost('description'),
			'prix' => $this->request->getPost('prix'),
			'duree' => $this->request->getPost('duree'),
			'entrainement' => $entrainement,
			'multimedia' => $multimedia,
			'alimentaire' => $alimentaire,
			'bilan' => $bilan,
			'whatsapp' => $whatsapp
		];

		// Insérer dans la base de données
		$programmeModel = new ProgrammeModel();
		$programmeModel->insert($data);

		// Rediriger vers la liste des programmes
		return redirect()->to('/admin/programme');
	}

	public function modifProgramme($id)
	{
		$programmeModel = new ProgrammeModel();

		// Récupérer les autres données du formulaire
		$data = [
			'nom' => $this->request->getPost('nom'),
			'description' => $this->request->getPost('description'),
			'prix' => $this->request->getPost('prix'),
			'duree' => $this->request->getPost('duree')
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

		$programmeModel->delete($id);
		
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
		return redirect()->to('/admin/programme');
	}

	public function supprPromotion($id)
	{
		$promotionModel = new PromotionModel();
		$promotionModel->delete($id);

		return redirect()->to('/admin/programme');
	}
	
	public function temoignage()
	{
		$temoignageModel = new TemoignageModel();
		$temoignages = $temoignageModel->findAll();

		$saiyanModel = new SaiyanModel();
		foreach ($temoignages as $key => $temoignage) {
			$temoignages[$key]['saiyan'] = $saiyanModel->find($temoignage['idsaiyan']);
		}

		$data = [
			'temoignages' => $temoignages,
		];

		return view('admin/temoignage', $data);
	}

	public function modifTemoignage($id)
	{
		$temoignageModel = new TemoignageModel();

		$data = [
			'affichage' => $this->request->getPost('affichage') == 't' ? true : false,
		];
		$temoignageModel->update($id, $data);
		return redirect()->to('/admin/temoignage');
	}

	public function supprTemoignage($id)
	{
		$temoignageModel = new TemoignageModel();
		$temoignageModel->delete($id);

		return redirect()->to('/admin/temoignage');
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

	public function modifArticle($id)
	{
		$articleModel = new ArticleModel();

		$oldImage = $articleModel->find($id)['image'];
		$newImage = $this->request->getFile('image');
		if($newImage->isValid() && !$newImage->hasMoved()){
			$newName = $newImage->getClientPath();
			$files = array_diff(scandir('./assets/images'), array('.', '..'));
			if(in_array($oldImage, $files)){
				unlink('./assets/images/' . $oldImage);
			}
			$newImage->move('./assets/images', $newName);
		}
		else {
			$newName = null;
		}

		$data = [
			'titre' => $this->request->getPost('titre'),
			'contenu' => $this->request->getPost('contenu'),
			'image' => $newName,
			'type' => $this->request->getPost('type'),
			'affichage' => $this->request->getPost('affichage') == 't' ? true : false,
		];


		$articleModel->update($id, $data);
		return redirect()->to('/admin/article');
	}

	public function supprArticle($id)
	{
		$articleModel = new ArticleModel();
		$articleModel->delete($id);

		return redirect()->to('/admin/article');
	}


	public function question(){
		$model = new QuestionModel();
		$data['questions'] = $model->getPaginatedQuestion();
		$data['pagerQuestions'] = $model->pager;
		return view('/admin/question', $data);
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

	public function modifier($nomModel, $id) {
		
		$model = 'App\Models\\' . ucfirst($nomModel) . 'Model';
		$model = new $model();
		$data = $model->find($id);

		if($model instanceof PromotionModel){
			$programmeModel = new ProgrammeModel();
			$programmes = $programmeModel->findAll();
			
			$prog = [];
			foreach ($programmes as $key => $programme) {
				
				$prog[$programme['id']] = $programme['nom'];
			}
		} else {
			$prog = [];
		}

		if($model instanceof TemoignageModel){
			$saiyanModel = new SaiyanModel();
			$saiyans = $saiyanModel->findAll();
			
			$saiy = [];
			foreach ($saiyans as $key => $saiyan) {	
				$saiy[$saiyan['id']] = $saiyan['prenom'] . ' ' . $saiyan['nom'];
			}
		} else {
			$saiy = [];
		}

		$data = [
			'data' => $data,
			'model' => $nomModel,
			'programmes' => $prog,
			'saiyans' => $saiy
		];
		return view('admin/modifier', $data);
	}
}