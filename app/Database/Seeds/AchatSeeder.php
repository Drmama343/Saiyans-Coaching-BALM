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
				'note' => 5,
				'date' => '2024-01-01',
				'temoignage' => 'Programme très efficace pour démarrer.',
			],
			[
				'idsaiyan' => 2,
				'idproduit' => 2,
				'note' => 4,
				'date' => '2024-01-15',
				'temoignage' => 'Guide bien structuré, facile à suivre.',
			],
		];

		$this->db->table('achat')->insertBatch($data);
	}
}
