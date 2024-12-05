<?php

namespace App\Controllers;

use App\Models\SaiyanModel;
use App\Models\AchatModel;
use App\Models\AbonnementModel;
use App\Models\ProduitModel;

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

		$jsonString = $saiyan['adresse'];

		$tmp = json_decode($jsonString, associative: true);

		$adresseFormattee = $tmp['rue'] . ' ' . $tmp['code_postal'] . ' ' . $tmp['ville'];

		$data['adresse'] == $adresseFormattee;


        $achatModel = new AchatModel();
        $produitModel = new ProduitModel();
        $achats =  $achatModel->where('idsaiyan', $idSaiyan)->findAll();
        foreach ($achats as &$achat){
            $achat['produit'] = $produitModel->find($achat['idproduit'])['nom'];
        }
        $data['achats'] = $achats;

        $abonnementModel = new AbonnementModel();
        $data['abonnement'] = $abonnementModel->find($saiyan['abonnement'])['nom'] == null ? "Vous n'avez aucun abonnement !" : $abonnementModel->find($saiyan['abonnement'])['nom'];

        return view('profil', $data);
    }

    public function modifierProfil ($idBase){
        $saiyanModel = new SaiyanModel();
		$id = $this->session->get('utilisateur')['id'];
		$mail = trim($this->request->getVar('email'));
		$saiyanBase = $saiyanModel->where('id', $idBase)->first();

		//Vérification de l'unicité de l'adresse mail
		if (($saiyanModel->where('mail', $mail)->first() && !filter_var($mail, FILTER_VALIDATE_EMAIL)) && $mail != $saiyanBase['mail']) {
			$this->session->setFlashdata('error', 'Cette adresse mail est déjà utilisée ou invalide');
			$this->session->setFlashdata('show_modal', 'creationProfilModal');
			return redirect()->to('/profil');
		}

		//verif adresse
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
		if($this->request->getVar('telephone') != "") {
			if (!preg_match('/^0[1-9]([-. ]?[0-9]{2}){4}$/', $this->request->getVar('telephone'))) {
				$this->session->setFlashdata('error', 'Le numéro de téléphone est invalide');
				return redirect()->to('/profil');
			}
		} else {
			$telephone = null;
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
            'adresse' => $response,
            'tel' => $telephone,
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

			// Vérification que le mot de passe fasse au moins 8 caractères, contienne une majuscule, une minuscule et un chiffre
			if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $this->request->getVar('nouveau_mdp'))) {
				$this->session->setFlashdata('error', 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre');
				$this->session->setFlashdata('show_modal', 'creationProfilModal');
				return redirect()->to('/profil');
			}

			//Vérification du mot de passe
			if ($this->request->getVar('nouveau_mdp') != $this->request->getVar('mdp_confirm')) {
				$this->session->setFlashdata('error', 'Les mots de passe ne correspondent pas');
				$this->session->setFlashdata('show_modal', 'creationProfilModal');
				return redirect()->to('/profil');
			}

			$nouveauMdpUtilisateur = [
				'mdp' => password_hash($this->request->getVar('nouveau_mdp'), PASSWORD_DEFAULT)
			];
			$saiyanModel->update($idBase, $nouveauMdpUtilisateur);
		}

		$idFinal = $saiyanModel->where('id', $id)->first();
		$this->session->set('utilisateur', $idFinal);
		return redirect()->to('/profil')->with('success', 'Saiyan modifié avec succès');
    }
}