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
				'idsaiyan' => 5,
				'temoignage' => null,
				'note' => 4,
				'date' => '2024-01-02',
				'affichage' => true,
			],
			[
				'idsaiyan' => 7,
				'temoignage' => 'Programme très complet, j\'ai perdu pas loin de 10 kilos',
				'note' => 5,
				'date' => '2024-03-01',
				'affichage' => true,
			],
			[
				'idsaiyan' => 3,
				'temoignage' => 'Je recommande vivement ce programme, ça a changé ma vie.',
				'note' => 5,
				'date' => '2024-04-15',
				'affichage' => true,
			],
			[
				'idsaiyan' => 9,
				'temoignage' => null,
				'note' => 3,
				'date' => '2024-05-10',
				'affichage' => true,
			],
			[
				'idsaiyan' => 4,
				'temoignage' => null,
				'note' => 5,
				'date' => '2024-06-20',
				'affichage' => true,
			],
			[
				'idsaiyan' => 6,
				'temoignage' => 'Programme adapté à tous les niveaux, je suis très satisfait.',
				'note' => 4,
				'date' => '2024-07-05',
				'affichage' => true,
			],
		];

		$this->db->table('temoignage')->insertBatch($data);
	}
}
