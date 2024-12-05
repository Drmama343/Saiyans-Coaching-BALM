<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AchatSeeder extends Seeder
{
	
	public function run()
	{
		$this->db->query('TRUNCATE TABLE achat RESTART IDENTITY CASCADE');

		$data = [
			[
				'idsaiyan' => 1,
				'idproduit' => 1,
				'date' => '2024-01-01',
				'echeance' => '2025-07-15',
			],
			[
				'idsaiyan' => 3,
				'idproduit' => 2,
				'date' => '2024-01-15',
				'echeance' => '2025-01-15',
			],
		];

		$this->db->table('achat')->insertBatch($data);
	}
}
