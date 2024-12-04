<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticleSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id' => 1,
				'titre' => 'Les bases de la musculation',
				'contenu' => 'Découvrez comment commencer la musculation efficacement.',
				'auteur' => 1,
				'date_publi' => '2024-01-10',
				'image' => 'musculation-bases.jpg',
			],
			[
				'id' => 2,
				'titre' => 'Alimentation pour sportifs',
				'contenu' => 'Les meilleures pratiques alimentaires pour booster vos performances.',
				'auteur' => 2,
				'date_publi' => '2024-01-20',
				'image' => 'alimentation-sport.jpg',
			],
		];

		$this->db->table('article')->insertBatch($data);
	}
}
