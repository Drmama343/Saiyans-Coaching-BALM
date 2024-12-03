<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AbonnementSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id' => 1,
				'nom' => 'Pack Premium',
				'photo' => 'premium.jpg',
				'description' => 'Abonnement complet incluant tous les services pour un coaching optimal.',
				'prix' => 249.99,
				'entrainement' => true,
				'multimedia' => true,
				'alimentaire' => true,
				'bilan' => true,
				'whatsapp' => true,
			],
			[
				'id' => 2,
				'nom' => 'Pack Basique',
				'photo' => 'basique.jpg',
				'description' => 'Abonnement basique avec accès aux programmes d\'entraînement.',
				'prix' => 159.99,
				'entrainement' => true,
				'multimedia' => false,
				'alimentaire' => true,
				'bilan' => false,
				'whatsapp' => true,
			],
			[
				'id' => 3,
				'nom' => 'Pack Nutrition',
				'photo' => 'nutrition.jpg',
				'description' => 'Un pack axé sur la nutrition sportive pour améliorer vos performances.',
				'prix' => 109.99,
				'entrainement' => false,
				'multimedia' => true,
				'alimentaire' => true,
				'bilan' => true,
				'whatsapp' => false,
			],
		];

		$this->db->table('abonnement')->insertBatch($data);
	}
}