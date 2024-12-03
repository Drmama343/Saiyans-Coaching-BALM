<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VideoSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id' => 1,
				'titre' => 'Séance d\'entraînement pour débutants',
				'description' => 'Une séance de 30 minutes pour commencer.',
				'video' => 'video1.mp4',
			],
			[
				'id' => 2,
				'titre' => 'Étirements après l\'effort',
				'description' => 'Des exercices pour récupérer après une séance intense.',
				'video' => 'video2.mp4',
			],
		];

		$this->db->table('video')->insertBatch($data);
	}
}
