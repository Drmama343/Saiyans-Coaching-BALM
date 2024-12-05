<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AchatSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'idsaiyan' => 1,
				'idproduit' => 1,
				'date' => '2024-01-01',
			],
			[
				'idsaiyan' => 3,
				'idproduit' => 2,
				'date' => '2024-01-15',
			],
		];

		$this->db->table('achat')->insertBatch($data);
	}
}
