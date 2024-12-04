<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProduitSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id' => 1,
				'nom' => 'Programme Musculation',
				'titre' => 'Musculation pour débutants',
				'photo' => 'musculation-debutants.jpg',
				'description' => 'Un programme complet pour débuter la musculation avec des exercices faciles.',
				'prix' => 29.99,
			],
			[
				'id' => 2,
				'nom' => 'Nutrition Sportive',
				'titre' => 'Guide Nutrition',
				'photo' => 'nutrition-sportive.jpg',
				'description' => 'Guide nutritionnel adapté aux sportifs pour des performances optimales.',
				'prix' => 19.99,
			],
		];

		$this->db->table('produit')->insertBatch($data);
	}
}
