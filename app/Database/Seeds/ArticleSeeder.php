<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticleSeeder extends Seeder
{
	public function run()
	{
		$this->db->query('TRUNCATE TABLE article RESTART IDENTITY CASCADE');

		$data = [
			[
				'id' => 1,
				'titre' => 'Les bases de la musculation',
				'contenu' => 'Découvrez comment commencer la musculation efficacement.',
				'auteur' => 1,
				'image' => 'musculation-bases.jpg',
			],
			[
				'id' => 2,
				'titre' => 'Alimentation pour sportifs',
				'contenu' => 'Les meilleures pratiques alimentaires pour booster vos performances.',
				'auteur' => 1,
				'image' => 'alimentation-sport.jpg',
			],
		];

		$this->db->table('article')->insertBatch($data);
	}
}
