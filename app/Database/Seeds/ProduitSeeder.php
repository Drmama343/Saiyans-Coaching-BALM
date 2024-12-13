<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProduitSeeder extends Seeder
{
	public function run()
	{
		$this->db->query('TRUNCATE TABLE produit RESTART IDENTITY CASCADE');

		$data = [
			[
				'nom' => 'Pack Premium',
				'description' => 'Abonnement complet incluant tous les services pour un coaching optimal.',
				'prix' => 249.99,
				'duree'=> 18,
				'entrainement' => true,
				'multimedia' => true,
				'alimentaire' => true,
				'bilan' => true,
				'whatsapp' => true,
			],
			[
				'nom' => 'Pack Basique',
				'description' => 'Abonnement basique avec accès aux programmes d\'entraînement.',
				'prix' => 159.99,
				'duree'=> 12,
				'entrainement' => true,
				'multimedia' => true,
				'alimentaire' => true,
				'bilan' => false,
				'whatsapp' => true,
			],
			[
				'nom' => 'Pack Nutrition',
				'description' => 'Un pack axé sur la nutrition sportive pour améliorer vos performances.',
				'prix' => 79.99,
				'duree'=> 6,
				'entrainement' => false,
				'multimedia' => true,
				'alimentaire' => true,
				'bilan' => false,
				'whatsapp' => false,
			],
			[
				'nom' => 'Pack Decouverte',
				'description' => 'Un pack permettant de découvrir le monde de la musculation.',
				'prix' => 114.99,
				'duree'=> 6,
				'entrainement' => true,
				'multimedia' => true,
				'alimentaire' => false,
				'bilan' => false,
				'whatsapp' => false,
			],
		];

		$this->db->table('produit')->insertBatch($data);
	}
}
