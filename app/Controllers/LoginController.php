<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\SaiyanModel;

class LoginController extends BaseController {

	protected $session;
	public function __construct() {
		helper('form');
		$this->session = session();
	}

	public function index() {
		return view('login');
	}

	public function connexion() {
		if($this->request->getMethod() == 'POST') {
			$utilisateurModel = new SaiyanModel();
			$utilisateur = $utilisateurModel->where('mail', $this->request->getVar('email'))->first();

			if ($utilisateur) {
				if (password_verify($this->request->getVar('password'), $utilisateur['mdp'])) {
					// Si l'utilisateur a coché la case "Se souvenir de moi", on garde l'identifiant en cookie
					if($this->request->getVar('remember')) {
						setcookie('identifiant', $this->request->getVar('identifiant'), time() + 3600 * 24 * 30);
					} else {
						setcookie('identifiant', '', time() - 3600);
					}

					$this->session->set('utilisateur', $utilisateur);
					return redirect()->to('/');
				} else {
					$this->session->setFlashdata('password', 'Mot de passe incorrect');
					return redirect()->to('/connexion');
				}
			} else {
				$this->session->setFlashdata('email', 'Identifiant incorrect');
				return redirect()->to('/connexion');
			}
		} else {
			return view('login');
		}
	}

	public function register() {
		$utilisateurModel = new SaiyanModel();
		$username = trim($this->request->getVar('username'));
		$mail = trim($this->request->getVar('email'));

		//Vérification de l'unicité du nom d'utilisateur
		if ($utilisateurModel->where('username', $username)->first() || $username === "") {
			$this->session->setFlashdata('error', 'Ce nom d\'utilisateur est déjà utilisé ou invalide');
			return redirect()->to('/register');
		}

		//Vérification de l'unicité de l'adresse mail
		if ($utilisateurModel->where('mail', $mail)->first() && !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			$this->session->setFlashdata('error', 'Cette adresse mail est déjà utilisée ou invalide');
			return redirect()->to('/register');
		}

		// Vérification que le mot de passe fasse au moins 8 caractères, contienne une majuscule, une minuscule et un chiffre
		if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/', $this->request->getVar('mdp'))) {
			$this->session->setFlashdata('error', 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre');
			return redirect()->to('/register');
		}

		//Vérification du mot de passe
		if ($this->request->getVar('mdp') != $this->request->getVar('mdp_confirm')) {
			$this->session->setFlashdata('error', 'Les mots de passe ne correspondent pas');
			return redirect()->to('/register');
		}

		$utilisateur = [
			'username' => $username,
			'nom' => $this->request->getVar('nom'),
			'prenom' => $this->request->getVar('prenom'),
			'mail' => $mail,
			'mdp' => password_hash($this->request->getVar('mdp'), PASSWORD_DEFAULT)
		];

		$utilisateurModel->insert($utilisateur);

		$this->session->setFlashdata('success', 'Votre compte a été crée avec succès. Un email vous a été envoyer pour valider votre compte, afin de pouvoir vous connecter.');
		return redirect()->to('/login');
	}

	public function modifProfil($usernameBase)
	{
		$utilisateurModel = new SaiyanModel();
		$username = trim($this->request->getVar('username'));
		$mail = trim($this->request->getVar('email'));
		$utilisateurBase = $utilisateurModel->where('username', $usernameBase)->first();

		//Vérification de l'unicité du nom d'utilisateur
		if (($utilisateurModel->where('username', $username)->first() || $username === "") && $username != $usernameBase) {
			$this->session->setFlashdata('error', 'Ce nom d\'utilisateur est déjà utilisé ou invalide');
			$this->session->setFlashdata('show_modal', 'creationProfilModal');
			return redirect()->to('/index');
		}

		//Vérification de l'unicité de l'adresse mail
		if (($utilisateurModel->where('mail', $mail)->first() && !filter_var($mail, FILTER_VALIDATE_EMAIL)) && $mail != $utilisateurBase['mail']) {
			$this->session->setFlashdata('error', 'Cette adresse mail est déjà utilisée ou invalide');
			$this->session->setFlashdata('show_modal', 'creationProfilModal');
			return redirect()->to('/index');
		}

		$nouveauUtilisateur = [
			'username' => $username,
			'nom' => $this->request->getVar('nom'),
			'prenom' => $this->request->getVar('prenom'),
			'mail' => $mail,
		];

		$utilisateurModel->update($usernameBase, $nouveauUtilisateur);

		if($this->request->getVar('mdp_actuel') != "" || $this->request->getVar('ancien_mdp') != "" || $this->request->getVar('mdp_confirm') != "")
		{
			if(!password_verify($this->request->getVar('mdp_actuel'), $utilisateurBase['mdp']))
			{
				$this->session->setFlashdata('error', 'Le mot de passe est incorrect');
				$this->session->setFlashdata('show_modal', 'creationProfilModal');
				return redirect()->to('/index');
			}

			// Vérification que le mot de passe fasse au moins 8 caractères, contienne une majuscule, une minuscule et un chiffre
			if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $this->request->getVar('nouveau_mdp'))) {
				$this->session->setFlashdata('error', 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre');
				$this->session->setFlashdata('show_modal', 'creationProfilModal');
				return redirect()->to('/index');
			}

			//Vérification du mot de passe
			if ($this->request->getVar('nouveau_mdp') != $this->request->getVar('mdp_confirm')) {
				$this->session->setFlashdata('error', 'Les mots de passe ne correspondent pas');
				$this->session->setFlashdata('show_modal', 'creationProfilModal');
				return redirect()->to('/index');
			}

			$nouveauMdpUtilisateur = [
				'mdp' => password_hash($this->request->getVar('nouveau_mdp'), PASSWORD_DEFAULT)
			];
			$utilisateurModel->update($usernameBase, $nouveauMdpUtilisateur);
		}

		$usernameFinal = $utilisateurModel->where('username', $username)->first();
		$this->session->set('utilisateur', $usernameFinal);
		return redirect()->to('/index')->with('success', 'Utilisateur modifier avec succès');
	}

	public function forgotpwd()
	{
		if($this->request->getMethod() == 'POST') {
			$utilisateurModel = new SaiyanModel();

			$mail = $this->request->getVar('mail');
			$utilisateur = $utilisateurModel->where('mail', $mail)->first();

			if ($utilisateur) {
				// Générer un jeton de réinitialisation de MDP et enregistrer-le dans BD
				$token = bin2hex(random_bytes(16));
				$expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
				$utilisateurModel->set('reset_token', $token)->set('reset_token_expiration', $expiration)->update($utilisateur['id']);
				// Envoyer l'e-mail avec le lien de réinitialisation
				$resetLink = site_url("resetpwd/$token");
				$message = "Bonjour ".$utilisateur['prenom'].",\n\nVous avez demandé à réinitialiser votre mot de passe. \n\nCliquez sur le lien ci-dessous pour choisir un nouveau mot de passe :\n$resetLink \n\nSi vous n'avez pas demandé la réinitialisation de votre mot de passe, veuillez ignorer ce message. Votre mot de passe restera inchangé.\n\nPour des raisons de sécurité, ce lien expirera dans 1 heure.\n\nCordialement,\n\nL'équipe Saiyan's Coaching ";
				// Utilisez la classe Email de CodeIgniter pour envoyer l'e-mail
				$emailService = \Config\Services::email();
				//envoi du mail
				$emailService->setTo($mail);
				$emailService->setFrom('sgt.balm.projetsynthese@gmail.com');
				$emailService->setSubject('Réinitialisez votre mot de passe');
				$emailService->setMessage($message);
				if ($emailService->send()) {
					$this->session->setFlashdata('success', 'E-mail envoyé avec succès. (' . $mail . ')');
					return redirect()->to('/forgotpwd');
				} else {
					echo $emailService->printDebugger();
				}
			} else {
				$this->session->setFlashdata('error', 'Adresse e-mail non valide.');
				return redirect()->to('/forgotpwd');
			}
		} else {
			return view('login');
		}
	}

	public function resetpwd($token)
	{
		if($this->request->getMethod() == 'POST') {
			$utilisateurModel = new SaiyanModel();

			// Valider et traiter les données du formulaire
			$utilisateur = $utilisateurModel->where('reset_token', $token)->where('reset_token_expiration >', date('Y-m-d H:i:s'))->first();

			if (!$utilisateur) {
				$utilisateur = $utilisateurModel->where('reset_token', $token)->first();
				if ($utilisateur) {
					$utilisateurModel->set('reset_token', null)->set('reset_token_expiration', null)->update($utilisateur['id']);
					$this->session->setFlashdata('error', 'Le lien de réinitialisation est expiré.');
					return redirect()->to('/connexion');
				}
				$this->session->setFlashdata('error', 'Le lien de réinitialisation est invalide ou à déja été utilisé.');
				return redirect()->to('/connexion');
			}

			// Vérification que le mot de passe fasse au moins 8 caractères, contienne une majuscule, une minuscule et un chiffre
			if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/', $this->request->getVar('mdp'))) {
				$this->session->setFlashdata('error', 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre');
				return redirect()->to("/resetpwd/$token");
			}

			//Vérification du mot de passe
			if ($this->request->getVar('mdp') != $this->request->getVar('mdp_confirm')) {
				$this->session->setFlashdata('error', 'Les mots de passe ne correspondent pas');
				return redirect()->to("/resetpwd/$token");
			}

			// Valider et traiter les données du formulaire
			$utilisateur = $utilisateurModel->where('reset_token', $token)->where('reset_token_expiration >', date('Y-m-d H:i:s'))->first();

			if (!$utilisateur) {
				$this->session->setFlashdata('error', 'Le lien de réinitialisation est invalide ou expiré.');
				return redirect()->to('/connexion');
			}

			// Mettre à jour le mot de passe et réinitialiser le jeton
			$hashedPassword = password_hash($this->request->getVar('mdp'), PASSWORD_DEFAULT);

			$utilisateurModel->set('mdp', $hashedPassword)->set('reset_token', null)->set('reset_token_expiration', null)->update($utilisateur['id']);
			$this->session->setFlashdata('success', 'Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter.');
			return redirect()->to('/connexion');
		} else {
			return view('login', ['token' => $token]);
		}
	}

	public function logout() {
		$this->session->remove('utilisateur');
		return redirect()->to('/');
	}

}