<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MediaSeeder extends Seeder
{
	public function run()
	{
		$this->db->query('TRUNCATE TABLE media RESTART IDENTITY CASCADE');

		$data = [
			[
				'id' => 1,
				'titre' => 'Séance d\'entraînement pour débutants',
				'description' => 'Une séance de 30 minutes pour commencer.',
				'media' => 'video1.mp4',
				'type' => 'video',
			],
			[
				'id' => 2,
				'titre' => 'Étirements après l\'effort',
				'description' => 'Des exercices pour récupérer après une séance intense.',
				'media' => 'video2.mp4',
				'type' => 'video',
			],
		];

		$this->db->table('media')->insertBatch($data);
	}
}
