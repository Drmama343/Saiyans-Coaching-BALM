<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TemoignageSeeder extends Seeder
{
	public function run()
	{
		$this->db->query('TRUNCATE TABLE temoignage RESTART IDENTITY CASCADE');

		$data = [
			[
				'idsaiyan' => 1,
				'temoignage' => 'Voila ma transformation physique',
				'note' => 4,
				'date' => '2024-01-02',
				'affichage' => true,
			],
			[
				'idsaiyan' => 2,
				'temoignage' => 'Programme très complet, j\'ai perdu pas loin de 20 kilos',
				'note' => 5,
				'date' => '2024-03-01',
				'affichage' => true,
			],
		];

		$this->db->table('temoignage')->insertBatch($data);
	}
}
