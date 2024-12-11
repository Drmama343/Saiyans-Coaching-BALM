<?php

namespace App\Controllers;

use App\Models\ProgrammeModel;
use App\Models\AchatModel;

class ProgrammeController extends BaseController
{
	protected $session;
	public function __construct() {
		$this->session = session();
	}

	public function index(): string
	{
		$programmeModel = new ProgrammeModel();
		$achatModel = new AchatModel();

		$produits = $programmeModel->findAll();

		$utilisateur = $this->session->get('utilisateur');
		if($utilisateur != null)
		{
			$achats = $achatModel->where('idsaiyan', $utilisateur['id'])->find();

			$achatsProduitIds = array_column($achats, 'idproduit'); // Récupère tous les idproduit des achats

			// Filtrer les produits pour enlever ceux déjà présents dans les achats
			$produitsFiltres = array_filter($produits, function ($produit) use ($achatsProduitIds) {
				return !in_array($produit['id'], $achatsProduitIds); // Garder uniquement les produits qui ne sont pas dans les achats
			});
		
			// Convertir les résultats filtrés en tableau indexé
			$produits = array_values($produitsFiltres);
		}
		
		$data['produits'] = $produits;
		
		return view('programme', $data);
	}

	public function achat($id)
	{
		$achatModel = new AchatModel();
		$programmeModel = new ProgrammeModel();

		$utilisateur = $this->session->get('utilisateur');
		if($utilisateur == null)
		{
			return redirect()->to('connexion');
		}

		$produit = $programmeModel->find($id);

		if($achatModel->where('idsaiyan', $utilisateur['id'])->where('idproduit', $produit['id'])->find())
		{
			$this->session->setFlashdata('alert_message', 'Vous possédez déjà ce programme');
			return redirect()->to('programme');
		}

		if($produit) {
			$dateActuelle = new \DateTime();
			$dateActuelle->setTime(0, 0, 0);

			$echeance = (clone $dateActuelle)->add(new \DateInterval('P' . $produit['duree'] . 'M'));

			$achat = [
				'idsaiyan' => $utilisateur['id'],
				'idproduit' => $produit['id'],
				'date' => $dateActuelle->format('Y-m-d'),
				'echeance' => $echeance->format('Y-m-d')
			];

			$achatModel->insert($achat);
		}

		$this->session->setFlashdata('alert_message', 'L\'achat a été réalisé avec succes');
		return redirect()->to('programme');
	}
}