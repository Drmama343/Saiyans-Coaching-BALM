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

		if (!isset($_SESSION['rechercheSaiyan'])){
			$saiyans = $saiyanModel->getPaginatedSaiyans(10);
		}
		else{
			$saiyans = $saiyanModel->getPaginatedSaiyansRecherche($_SESSION['rechercheSaiyan'], 10);
		}

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
		if (!isset($_SESSION['rechercheSaiyan'])){
			$data['saiyans'] = $model->getPaginatedSaiyans(10);
		}
		else{
			$data['saiyans'] = $model->getPaginatedSaiyansRecherche($_SESSION['rechercheSaiyan'], 10);
		}
		
		$data['pagerSaiyan'] = $model->pager;

		return view('admin/saiyan', $data);
	}
	public function setRechercheSaiyan()
	{
		$session = session();

		$recherche = $this->request->getPost('recherche');
		if ($recherche) {
			$session->set('rechercheSaiyan', $recherche);
		}
		else {
			$session->set('rechercheSaiyan', "");
		}

		return redirect()->to('admin/saiyan');
	}
	public function setRechercheSaiyanStats()
	{
		$session = session();

		$recherche = $this->request->getPost('recherche');
		if ($recherche) {
			$session->set('rechercheSaiyan', $recherche);
		}
		else {
			$session->set('rechercheSaiyan', "");
		}

		return redirect()->to('admin');
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
		$temoignage = $temoignageModel->find($id);

		if ($temoignage) {
			if (!empty($temoignage['image'])) {
				$imagePath = WRITEPATH . '../public/assets/images/temoignages/' . $temoignage['image'];
	
				if (is_file($imagePath)) {
					unlink($imagePath);
				}
			}
	
			$temoignageModel->delete($id);
		}
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

	public function ajoutArticle()
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

	public function modifArticle($id)
	{
		$articleModel = new ArticleModel();
		$article = $articleModel->find($id);

		$file = $this->request->getFile('image');
		if ($file != null) {
			if ($file && $file->isValid() && !$file->hasMoved()) {
				if (!empty($article['image'])) {
					$oldImagePath = WRITEPATH . '../public/assets/images/' . $article['image'];
		
					if (is_file($oldImagePath)) {
						unlink($oldImagePath);
					}
				}
				
				// Nom unique pour éviter les collisions
				$imageType = exif_imagetype($_FILES['image']['tmp_name']);
				$newFileName = uniqid('article' . '_', true) . image_type_to_extension($imageType);
				$newPathFilename = WRITEPATH .'../public/assets/images/' . $newFileName;

				$this->saveImage($newPathFilename);
			} else {
				// Gérer les erreurs
				return redirect()->back()->with('error', 'Le fichier n\'est pas valide ou n\'a pas été téléchargé correctement.');
			}
		}

		$data = [
			'titre' => $this->request->getPost('titre'),
			'contenu' => $this->request->getPost('contenu'),
			'image' => isset($newFileName) ? $newFileName : null,
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
		
		if (!isset($_SESSION['rechercheQuestion'])){
			$data['questions'] = $model->getPaginatedQuestions();
		}
		else{
			$data['questions'] = $model->getPaginatedQuestionsRecherche($_SESSION['rechercheQuestion']);
		}
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
	public function setRechercheQuestion()
	{
		$session = session();

		$recherche = $this->request->getPost('recherche');
		if ($recherche) {
			$session->set('rechercheQuestion', $recherche);
		}
		else {
			$session->set('rechercheQuestion', "");
		}

		return redirect()->to('admin/question');
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

	public function saveImage($newPathFilename) {
		$imageType = exif_imagetype($_FILES['image']['tmp_name']);
		if (in_array($imageType, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF])) {
	
			// Charger l'image selon son type
			switch ($imageType) {
				case IMAGETYPE_JPEG:
					$image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
					break;
				case IMAGETYPE_PNG:
					$image = imagecreatefrompng($_FILES['image']['tmp_name']);
					break;
				case IMAGETYPE_GIF:
					$image = imagecreatefromgif($_FILES['image']['tmp_name']);
					break;
			}
	
			// Dimensions maximales
			$maxWidth = 600;
			$maxHeight = 600;
	
			// Obtenir les dimensions de l'image originale
			list($originalWidth, $originalHeight) = getimagesize($_FILES['image']['tmp_name']);
	
			// Calculer le ratio de redimensionnement
			$ratio = min($maxWidth / $originalWidth, $maxHeight / $originalHeight);
	
			// Nouvelles dimensions
			$newWidth = floor($originalWidth * $ratio);
			$newHeight = floor($originalHeight * $ratio);
	
			// Créer une image vide avec les nouvelles dimensions
			$newImage = imagecreatetruecolor($newWidth, $newHeight);
	
			// Conserver la transparence pour PNG et GIF
			if ($imageType == IMAGETYPE_PNG || $imageType == IMAGETYPE_GIF) {
				imagealphablending($newImage, false);
				imagesavealpha($newImage, true);
			}
	
			// Redimensionner l'image
			imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
	
			// Sauvegarder l'image redimensionnée
			switch ($imageType) {
				case IMAGETYPE_JPEG:
					imagejpeg($newImage, $newPathFilename, 90); // Compression pour JPEG
					break;
				case IMAGETYPE_PNG:
					imagepng($newImage, $newPathFilename);
					break;
				case IMAGETYPE_GIF:
					imagegif($newImage, $newPathFilename);
					break;
			}
	
			// Libérer la mémoire
			imagedestroy($image);
			imagedestroy($newImage);
		} else {
			return redirect()->back()->with('error', 'L\'extension du fichier n\'est pas accépté.');
		}
	}
}