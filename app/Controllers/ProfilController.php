<?php

namespace App\Controllers;

use App\Models\SaiyanModel;
use App\Models\AchatModel;
use App\Models\ProgrammeModel;
use App\Models\TemoignageModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ProfilController extends BaseController
{
	protected $session;
	public function __construct() {
		helper('form');
		$this->session = session();
	}

	public function index(): string
	{
		$saiyanModel = new SaiyanModel();
		if (!isset($_SESSION['utilisateur'])){
			redirect('/');
		}

		$idSaiyan = $this->session->get('utilisateur')['id'] == null ? redirect('/') : $this->session->get('utilisateur')['id'];

		$saiyan = $saiyanModel->find($idSaiyan);
		$data['saiyan'] = $saiyan;

		//changement du json en bdd vers un string
		if (isset($saiyan['adresse'])){
			$jsonString = $saiyan['adresse'];
			$tmp = json_decode($jsonString, associative: true);
			if (isset($tmp['query'])){
				$adresseFormattee = $tmp['query'];
			}
			else{
				$adresseFormattee = 'Adresse Invalide';
			}
			$data['stgAdr'] = $adresseFormattee;
		}
		else{
			$data['stgAdr'] = '';
		}

		if (isset($saiyan['tel'])) {
			$tel = $saiyan['tel'];
			$formattedTel = preg_replace('/(\d{2})/', '$1 ', $tel);
			$data['formattedTel'] = $formattedTel;
		}

		$achatModel = new AchatModel();
		$programmeModel = new ProgrammeModel();
		$achats =  $achatModel->where('idsaiyan', $idSaiyan)->findAll();
		foreach ($achats as &$achat){
			$achat['produit'] = $programmeModel->find($achat['idproduit'])['nom'];
		}
		$data['achats'] = $achats;

		$temoignageModel = new TemoignageModel();
		$temoignages =  $temoignageModel->where('idsaiyan', $idSaiyan)->findAll();
		$data['temoignages'] = $temoignages;

		return view('profil', $data);
	}

	public function modifierProfil ($idBase){
		$saiyanModel = new SaiyanModel();
		$id = $this->session->get('utilisateur')['id'];
		$mail = trim($this->request->getVar('mail'));
		$saiyanBase = $saiyanModel->where('id', $idBase)->first();

		// Vérification du nom, si il contient des chiffres ou des caractères spéciaux on renvoie une erreur
		if (preg_match('/[0-9!@#$%^&*(),.?":{}|<>]/', $this->request->getVar('nom'))) {
			$this->session->setFlashdata('error', 'Le nom ne doit pas contenir de chiffres ou de caractères spéciaux');
			return redirect()->to('/profil');
		} else {
			$nom = $this->request->getVar('nom');
		}

		// Vérification du prénom, si il contient des chiffres ou des caractères spéciaux on renvoie une erreur
		if (preg_match('/[0-9!@#$%^&*(),.?":{}|<>]/', $this->request->getVar('prenom'))) {
			$this->session->setFlashdata('error', 'Le prénom ne doit pas contenir de chiffres ou de caractères spéciaux');
			return redirect()->to('/profil');
		} else {
			$prenom = $this->request->getVar('prenom');
		}

		//Vérification de l'unicité de l'adresse mail et de sa validité
		$mail = trim($this->request->getVar('mail'));
		if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			$this->session->setFlashdata('error', 'Adresse e-mail invalide');
			return redirect()->to('/profil');
		}
		if ($saiyanModel->where('mail', $mail)->first() && $mail !== $saiyanBase['mail']) {
			$this->session->setFlashdata('error', 'Adresse e-mail déjà utilisée');
			return redirect()->to('/profil');
		}
		

		//Vérification de l'adresse et récupération des informations
		if ($this->request->getVar('adresse') != "") {
			$adresse = $this->request->getVar('adresse');
			$adresse = str_replace(' ', '+', $adresse);

			$url = "https://api-adresse.data.gouv.fr/search/?q=$adresse&limit=1";
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl);
			curl_close($curl);
		} else {
			$response = null;
		}

		//Vérification du numéro de téléphone et de sa validité
		if ($this->request->getVar('tel') != "") {
			// Supprimer tous les espaces
			$tel = str_replace(' ', '', $this->request->getVar('tel'));
			
			if (!preg_match('/^0[1-9]([-.]?[0-9]{2}){4}$/', $tel)) {
				$this->session->setFlashdata('error', 'Le numéro de téléphone est invalide');
			}
		} else {
			$tel = null;
		}

		//Vérification du sexe 
		if ($this->request->getVar('sexe') != 'H' && $this->request->getVar('sexe') != 'F') {
			$this->session->setFlashdata('error', 'Le sexe est invalide');
			return redirect()->to('/profil');
		} else {
			$sexe = $this->request->getVar('sexe');
		}

		//Vérification de l'âge
		$age = (integer)$this->request->getVar('age');
		if (!is_integer($age)) {
			$this->session->setFlashdata('error', 'L\'âge est invalide');
			return redirect()->to('/profil');
		}

		//Vérification de la taille et formatage
		$taille = (integer) $this->request->getVar('taille');
		if(!is_integer($taille)) {
			$this->session->setFlashdata('error', 'La taille est invalide');
			return redirect()->to('/profil');
		}

		//Vérification du poids
		$poids = (float) $this->request->getVar('poids');
		if(!is_float($poids)) {
			$this->session->setFlashdata('error', 'Le poids est invalide');
			return redirect()->to('/profil');
		}

		$nouveauSaiyan = [
			'id' => $id,
			'nom' => $this->request->getVar('nom'),
			'prenom' => $this->request->getVar('prenom'),
			'mail' => $mail,
			'adresse' => isset($response)? $response : null,
			'tel' => isset($tel)? $tel : null,
			'sexe' => $sexe,
			'age' => $age,
			'taille' => $taille,
			'poids' => $poids,
		];

		$saiyanModel->update($id, $nouveauSaiyan);

		if($this->request->getVar('mdp_actuel') != "" || $this->request->getVar('ancien_mdp') != "" || $this->request->getVar('mdp_confirm') != "")
		{
			if(!password_verify($this->request->getVar('mdp_actuel'), $saiyanBase['mdp']))
			{
				$this->session->setFlashdata('error', 'Le mot de passe est incorrect');
				$this->session->setFlashdata('show_modal', 'creationProfilModal');
				return redirect()->to('/profil');
			}

			// Vérification que le mot de passe fasse au moins 8 caractères, contienne une majuscule, une minuscule et un chiffre et autorise les caractères spéciaux
			// Vérification du mot de passe et de sa confirmation
			if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/', $this->request->getVar('mdp'))) {
				$this->session->setFlashdata('error', 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un caractère spécial et un chiffre');
				return redirect()->to('/profil');
			} elseif($this->request->getVar('mdp') != $this->request->getVar('mdp_confirm')) {
				$this->session->setFlashdata('error', 'Les mots de passe ne correspondent pas');
				return redirect()->to('/profil');
			} else {
				$mdp = $this->request->getVar('mdp');
			}

			$nouveauMdpUtilisateur = [
				'mdp' => password_hash($this->request->getVar('nouveau_mdp'), PASSWORD_DEFAULT)
			];
			$saiyanModel->update($idBase, $nouveauMdpUtilisateur);
		}

		$idFinal = $saiyanModel->where('id', $id)->first();
		$this->session->set('utilisateur', $idFinal);
		return redirect()->to('/profil');
	}

	public function supprimerProfil($idBase){
		$saiyanModel = new SaiyanModel();
		$saiyanModel->delete($idBase);
		$this->session->remove('utilisateur');
		return redirect()->to('/');
	}

	public function modifTemoignage($id)
	{
		$model = new TemoignageModel();
		$temoignage = $model->where('id', $id)->first();

		$file = $this->request->getFile('image');
		$newFileName = null; // Initialiser à null pour gérer les cas où aucune image n'est fournie

		// Vérifier si une image a été envoyée
		if ($file && $file->isValid() && !$file->hasMoved()) {
			$destinationPath = WRITEPATH . '../public/assets/images/temoignages';

			if (!empty($temoignage['image'])) {
				$imagePath = WRITEPATH . '../public/assets/images/temoignages/' . $temoignage['image'];
	
				if (is_file($imagePath)) {
					unlink($imagePath);
				}
			}

			// Créer le dossier si nécessaire
			if (!is_dir($destinationPath)) {
				mkdir($destinationPath, 0755, true);
			}

			// Vérifier si le fichier est une image valide
			$imageType = exif_imagetype($file->getTempName());
			if (in_array($imageType, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF])) {

				// Charger l'image selon son type
				switch ($imageType) {
					case IMAGETYPE_JPEG:
						$image = imagecreatefromjpeg($file->getTempName());
						break;
					case IMAGETYPE_PNG:
						$image = imagecreatefrompng($file->getTempName());
						break;
					case IMAGETYPE_GIF:
						$image = imagecreatefromgif($file->getTempName());
						break;
				}

				// Dimensions maximales
				$maxWidth = 600;
				$maxHeight = 600;

				// Obtenir les dimensions de l'image originale
				list($originalWidth, $originalHeight) = getimagesize($file->getTempName());

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

				// Nom unique pour éviter les collisions
				$newFileName = uniqid('temoignage_') . image_type_to_extension($imageType);
				$newPathFilename = $destinationPath . '/' . $newFileName;

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
				return redirect()->back()->with('error', 'L\'extension du fichier n\'est pas acceptée.');
			}
		}

		// Préparer les données pour l'insertion
		$t = [
			'temoignage' => $this->request->getVar('temoignage') ?? null,
			'note'       => $this->request->getVar('note'),
			'image'      => isset($newFileName) ? $newFileName : $temoignage["id"],
			'affichage'  => false,
		];

		// Insérer le témoignage
		$model->update($id, $t);

		return redirect('profil');
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

		return redirect()->to('/profil');
	}


	public function supprImageTemoignage($id)
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
			$data = [
				'image'      => null, 
			];
	
			$temoignageModel->update($id, $data);
		}

		return redirect()->to('/profil');
	}


	public function modifier($id) {
		
		$temoignageModel = new TemoignageModel();
		$temoignage =  $temoignageModel->where('id',$id)->first();

		$data = [
			'temoignage' => $temoignage,
		];
		return view('tools/modifierTemoignage', $data);
	}
}