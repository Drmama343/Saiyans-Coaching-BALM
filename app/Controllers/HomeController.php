<?php

namespace App\Controllers;

use \App\Models\PromotionModel;
use App\Models\ProgrammeModel;
use App\Models\TemoignageModel;
use App\Models\SaiyanModel;
use App\Models\AchatModel;

class HomeController extends BaseController
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}

	public function index(): string
	{
		$promotionModel = new PromotionModel();
		$programmeModel = new ProgrammeModel();
		$temoignageModel = new TemoignageModel();
		$saiyanModel = new SaiyanModel();
		$achatModel = new AchatModel();

		if($this->session->get('utilisateur')) {
			$achats = $achatModel->where("idsaiyan", $this->session->get('utilisateur')['id'])->find();
			foreach ($achats as $achat) {
				if($achat['echeance'] < (new \DateTime())->format('Y-m-d')) {$achatModel->delete($achat['id']);}
			}
		}

		$data['promotions'] = $promotionModel->findAll();

		foreach ($data['promotions'] as $key => $promotion) {
			$data['promotions'][$key]['produit'] = $programmeModel->find($promotion['produit']);
		}

		$produits = $programmeModel->orderBy('prix', 'ASC')->findAll();
		$temoignages = $temoignageModel->findByAffichage();
		$data['produits'] = $produits;
		
		foreach ($temoignages as $key => $temoignage) {
			$temoignages[$key]['saiyan'] = $saiyanModel->find($temoignage['idsaiyan']);
		}
		
		$data['temoignages'] = $temoignages;

		return view('index', $data);
	}

	public function cgv(): string
	{
		return view('cgv');
	}
}