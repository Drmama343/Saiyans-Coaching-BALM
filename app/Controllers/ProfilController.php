<?php

namespace App\Controllers;

use App\Models\SaiyanModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ProfilController extends BaseController
{
    protected $session;
    public function __construct() {
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

        return view('profil', $data);
    }
}