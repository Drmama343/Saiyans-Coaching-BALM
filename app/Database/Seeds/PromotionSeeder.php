<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PromotionSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id' => 1,
				'date_deb' => '2024-02-01',
				'date_fin' => '2024-02-28',
				'reduction' => 20,
				'code' => 'PROMO20',
				'nb_utilisation' => 100,
				'produit' => 1,
			],
			[
				'id' => 2,
				'date_deb' => '2024-03-01',
				'date_fin' => '2024-03-15',
				'reduction' => 10,
				'code' => 'MARS10',
				'nb_utilisation' => 50,
				'produit' => 2,
			],
		];

		$this->db->table('promotion')->insertBatch($data);
	}
}
