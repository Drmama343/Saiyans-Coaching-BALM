<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\TemoignageModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ContactController extends BaseController
{
	protected $session;
	public function __construct() {
		helper('form');
		$this->session = session();
	}

	public function index(): string
	{
		return view('contact');
	}

	public function sendMail()
	{
		$email = \Config\Services::email();

		$from = $this->request->getPost('email');
		$subject = $this->request->getPost('subject');
		$message = $this->request->getPost('message');

		if (filter_var($from, FILTER_VALIDATE_EMAIL) === false) {
			session()->setFlashdata('error_email', 'Adresse e-mail invalide.');
			return redirect()->to('/contact');
		}

		// Configuration de l'email
		$email->setFrom($from);
		$email->setReplyTo($from);
		$email->setTo('sgt.balm.projetsynthese@gmail.com'); // Remplacez par votre adresse e-mail de réception
		$email->setSubject($subject);
		$email->setMessage($message);

		// Envoi de l'email
		if ($email->send()) {
			session()->setFlashdata('message', 'Votre message a été envoyé avec succès.');
		} else {
			session()->setFlashdata('message', 'Une erreur s\'est produite lors de l\'envoi de votre message.');
		}

		return redirect()->to('/contact');
	}
}