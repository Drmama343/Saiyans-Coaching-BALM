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
			return redirect()->to('/dashboard');
		}

		$nouveauSaiyan = [
			'id' => $id,
			'nom' => $this->request->getVar('nom'),
			'prenom' => $this->request->getVar('prenom'),
			'mail' => $this->request->getVar('mail'),
            'adresse' => $this->request->getVar('adresse'),
            'tel' => $this->request->getVar('tel'),
            'sexe' => $this->request->getVar('sexe'),
            'age' => $this->request->getVar('age'),
            'taille' => $this->request->getVar('taille'),
            'poids' => $this->request->getVar('poids'),
		];

		$saiyanModel->update($id, $nouveauSaiyan);

		if($this->request->getVar('mdp_actuel') != "" || $this->request->getVar('ancien_mdp') != "" || $this->request->getVar('mdp_confirm') != "")
		{
			if(!password_verify($this->request->getVar('mdp_actuel'), $saiyanBase['mdp']))
			{
				$this->session->setFlashdata('error', 'Le mot de passe est incorrect');
				$this->session->setFlashdata('show_modal', 'creationProfilModal');
				return redirect()->to('/dashboard');
			}

			// Vérification que le mot de passe fasse au moins 8 caractères, contienne une majuscule, une minuscule et un chiffre
			if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $this->request->getVar('nouveau_mdp'))) {
				$this->session->setFlashdata('error', 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre');
				$this->session->setFlashdata('show_modal', 'creationProfilModal');
				return redirect()->to('/dashboard');
			}

			//Vérification du mot de passe
			if ($this->request->getVar('nouveau_mdp') != $this->request->getVar('mdp_confirm')) {
				$this->session->setFlashdata('error', 'Les mots de passe ne correspondent pas');
				$this->session->setFlashdata('show_modal', 'creationProfilModal');
				return redirect()->to('/dashboard');
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