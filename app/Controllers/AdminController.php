<?php

namespace App\Controllers;

use App\Models\AchatModel;
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
		$this->session->set('page', 'admin');
		return view('admin/admin', $data);
	}

	/* ----------------------------------------------
	   --------------     SAIYAN    -----------------
	   ---------------------------------------------- */
	public function saiyan(){
		$model = new SaiyanModel();
		if (!isset($_SESSION['rechercheSaiyan'])){
			$saiyans = $model->getPaginatedSaiyans(10);
		}
		else{
			$saiyans = $model->getPaginatedSaiyansRecherche($_SESSION['rechercheSaiyan'], 10);
		}

		$modelA = new AchatModel();
		if (!isset($_SESSION['rechercheAchat'])){
			$achats = $modelA->getPaginatedAchats();
		}
		else{
			$achats = $modelA->getPaginatedAchatsRecherche($_SESSION['rechercheAchat']);
		}

		$modelP = new ProgrammeModel();
		foreach ($achats as $key => $achat) {
			$tmp = $model->find($achat['idsaiyan']);
			$achats[$key]['saiyan'] = $tmp['prenom']. ' ' . $tmp['nom'];
		}

		foreach ($achats as $key => $achat) {
			$tmp = $modelP->find($achat['idproduit']);
			$achats[$key]['abonnement'] = $tmp['nom'];
		}

		$data = [
			'saiyans' => $saiyans,
			'pagerSaiyan' => $model->pager,
			'achats' => $achats,
			'pagerAchat' => $modelA->pager,
		];
		$this->session->set('page', 'adminSaiyan');
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
	public function setRechercheAchat()
	{
		$session = session();

		$recherche = $this->request->getPost('recherche');
		if ($recherche) {
			$session->set('rechercheAchat', $recherche);
		}
		else {
			$session->set('rechercheAchat', "");
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

	/* ----------------------------------------------
	   ------------     PROGRAMME    ----------------
	   ---------------------------------------------- */
	public function programme()
	{
		$programmeModel = new ProgrammeModel();
		$promotionModel = new PromotionModel();
		if (!isset($_SESSION['rechercheProgramme'])){
			$programmes = $programmeModel->getPaginatedProgrammes();
		}
		else{
			$programmes = $programmeModel->getPaginatedProgrammesRecherche($_SESSION['rechercheProgramme']);
		}
		if (!isset($_SESSION['recherchePromotion'])){
			$promotions = $promotionModel->getPaginatedPromotions();
		}
		else{
			$promotions = $promotionModel->getPaginatedPromotionsRecherche($_SESSION['recherchePromotion']);
		}

		foreach ($promotions as $key => $promotion) {
			$promotions[$key]['programme'] = $programmeModel->find($promotion['produit']);
		}

		$data = [
			'programmes' => $programmes,
			'pagerProgramme' => $programmeModel->pager,
			'promotions' => $promotions,
			'pagerPromotion' => $promotionModel->pager,
		];
		$this->session->set('page', 'adminProg');
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
			'entrainement' => $this->request->getPost('entrainement') ?? 'f',
			'multimedia' => $this->request->getPost('multimedia') ?? 'f',
			'alimentaire' => $this->request->getPost('alimentaire') ?? 'f',
			'bilan' => $this->request->getPost('bilan') ?? 'f',
			'whatsapp' => $this->request->getPost('whatsapp') ?? 'f'
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
			'duree' => $this->request->getPost('duree'),
			'entrainement' => $this->request->getPost('entrainement') ?? 'f',
			'multimedia' => $this->request->getPost('multimedia') ?? 'f',
			'alimentaire' => $this->request->getPost('alimentaire') ?? 'f',
			'bilan' => $this->request->getPost('bilan') ?? 'f',
			'whatsapp' => $this->request->getPost('whatsapp') ?? 'f'
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

	public function setRechercheProgramme()
	{
		$session = session();

		$recherche = $this->request->getPost('recherche');
		if ($recherche) {
			$session->set('rechercheProgramme', $recherche);
		}
		else {
			$session->set('rechercheProgramme', "");
		}

		return redirect()->to('admin/programme');
	}

	/* ----------------------------------------------
	   ------------     PROMOTION    ----------------
	   ---------------------------------------------- */
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

	public function setRecherchePromotion()
	{
		$session = session();

		$recherche = $this->request->getPost('recherche');
		if ($recherche) {
			$session->set('recherchePromotion', $recherche);
		}
		else {
			$session->set('recherchePromotion', "");
		}

		return redirect()->to('admin/programme');
	}
	
	/* ----------------------------------------------
	   ------------     TEMOIGNAGE    ---------------
	   ---------------------------------------------- */
	public function temoignage()
	{
		$temoignageModel = new TemoignageModel();
		if (!isset($_SESSION['rechercheTemoignage'])){
			$temoignages = $temoignageModel->getPaginatedTemoignages();
		}
		else{
			$temoignages = $temoignageModel->getPaginatedTemoignagesRecherche($_SESSION['rechercheTemoignage']);
		}

		$saiyanModel = new SaiyanModel();
		foreach ($temoignages as $key => $temoignage) {
			$temoignages[$key]['saiyan'] = $saiyanModel->find($temoignage['idsaiyan']);
		}

		$data = [
			'temoignages' => $temoignages,
			'pagerTemoignages' => $temoignageModel->pager,
		];
		$this->session->set('page', 'adminTemoi');
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

	public function setRechercheTemoignage()
	{
		$session = session();

		$recherche = $this->request->getPost('recherche');
		if ($recherche) {
			$session->set('rechercheTemoignage', $recherche);
		}
		else {
			$session->set('rechercheTemoignage', "");
		}

		return redirect()->to('admin/temoignage');
	}

	/* ----------------------------------------------
	   -------------     ARTICLE    -----------------
	   ---------------------------------------------- */
	public function article()
	{
		$articleModel = new ArticleModel();
		if (!isset($_SESSION['rechercheArticle'])){
			$articles = $articleModel->getPaginatedArticles();
		}
		else{
			$articles = $articleModel->getPaginatedArticlesRecherche($_SESSION['rechercheArticle']);
		}

		$data = [
			'articles' => $articles,
			'pagerArticles' => $articleModel->pager,
		];
		$this->session->set('page', 'adminArticle');
		return view('admin/article', $data);
	}

	public function ajoutArticle()
	{
		$articleModel = new ArticleModel();
		$file = $this->request->getFile('image');

		if ($file->getClientPath() != "") {
			if ($file && $file->isValid() && !$file->hasMoved()) {
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
			'auteur' => $this->session->get('utilisateur')['id'],
			'image' => isset($newFileName) ? $newFileName : null,
			'type' => $this->request->getPost('type'),
			'affichage' => $this->request->getPost('affichage') == 't' ? true : false,
		];

		$articleModel->insert($data);
		return redirect()->to('/admin/article');
	}

	public function modifArticle($id)
	{
		$articleModel = new ArticleModel();
		$article = $articleModel->find($id);

		$file = $this->request->getFile('image');
		if ($file->getClientPath() != "") {
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
			'image' => isset($newFileName) ? $newFileName : $article['image'],
			'type' => $this->request->getPost('type'),
			'affichage' => $this->request->getPost('affichage') == 't' ? true : false,
		];

		$articleModel->update($id, $data);
		return redirect()->to('/admin/article');
	}

	public function supprArticle($id)
	{
		$articleModel = new ArticleModel();
		$article = $articleModel->find($id);
		if ($article) {
			if (!empty($article['image'])) {
				$imagePath = WRITEPATH . '../public/assets/images/' . $article['image'];
	
				if (is_file($imagePath)) {
					unlink($imagePath);
				}
			}
			$articleModel->delete($id);
		}

		return redirect()->to('/admin/article');
	}

	public function supprImageArticle($id)
	{
		$articleModel = new ArticleModel();
		$article = $articleModel->find($id);
		if ($article) {
			if (!empty($article['image'])) {
				$imagePath = WRITEPATH . '../public/assets/images/' . $article['image'];
	
				if (is_file($imagePath)) {
					unlink($imagePath);
				}
			}
			$data = [
				'image'      => null, 
			];
	
			$articleModel->update($id, $data);
		}

		return redirect()->to('/admin/article');
	}

	public function setRechercheArticle()
	{
		$session = session();

		$recherche = $this->request->getPost('recherche');
		if ($recherche) {
			$session->set('rechercheArticle', $recherche);
		}
		else {
			$session->set('rechercheArticle', "");
		}

		return redirect()->to('admin/article');
	}

	/* ----------------------------------------------
	   -------------     QUESTION    ----------------
	   ---------------------------------------------- */
	public function question(){
		$model = new QuestionModel();
		
		if (!isset($_SESSION['rechercheQuestion'])){
			$data['questions'] = $model->getPaginatedQuestions();
		}
		else{
			$data['questions'] = $model->getPaginatedQuestionsRecherche($_SESSION['rechercheQuestion']);
		}
		$data['pagerQuestions'] = $model->pager;
		$this->session->set('page', 'adminQuest');
		return view('/admin/question', $data);
	}

	public function ajoutQuestion (){
		$model = new QuestionModel();

		$newQuestion = [
			'question' => $this->request->getVar('question'),
			'reponse' => $this->request->getVar('reponse'),
		];

		$model->insert($newQuestion);

		return redirect()->to('admin/question');
	}
	public function modifierQuestion ($idQuestion){
		$model = new QuestionModel();

		$questionChange = [
			'id' => $idQuestion,
			'question' => $this->request->getVar('question'),
			'reponse' => $this->request->getVar('reponse'),
		];

		$model->update($idQuestion, $questionChange);

		return redirect()->to('admin/question');
	}

	public function supprQuestion ($idQuestion){
		$model = new QuestionModel();

		$model->delete($idQuestion);

		return redirect()->to('admin/question');
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

	/* ----------------------------------------------
	   --------------     OUTILS    -----------------
	   ---------------------------------------------- */
	public function modifier($nomModel, $id=null) {
		
		$model = 'App\Models\\' . ucfirst($nomModel) . 'Model';
		$model = new $model();
		
		$id == null ? $data = [] : $data = $model->find($id);

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

	public function ajouter($nomModel) {

		if($nomModel == 'promotion'){
			$programmeModel = new ProgrammeModel();
			$programmes = $programmeModel->findAll();
			
			$prog = [];
			foreach ($programmes as $key => $programme) {
				
				$prog[$programme['id']] = $programme['nom'];
			}
		} else {
			$prog = [];
		}

		$data = [
			'data' => [],
			'model' => $nomModel,
			'programmes' => $prog,
			'saiyans' => []
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