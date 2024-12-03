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
        $data['abonnement'] = $abonnementModel->find($saiyan['abonnement'])['nom'];

        return view('profil', $data);
    }

    public function modifierProfil ($id){
        return view('index');
    }
}