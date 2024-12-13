<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PromotionSeeder extends Seeder
{
	public function run()
	{
		$this->db->query('TRUNCATE TABLE promotion RESTART IDENTITY CASCADE');

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
		];

		$this->db->table('promotion')->insertBatch($data);
	}
}
