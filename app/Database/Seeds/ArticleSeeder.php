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
				'titre' => 'Les bases de la musculation',
				'contenu' => 'Découvrez comment commencer la musculation efficacement.',
				'auteur' => 1,
				'image' => 'musculation-bases.jpg',
				'type' => 'blog',
			],
			[
				'titre' => 'Alimentation pour sportifs',
				'contenu' => 'Les meilleures pratiques alimentaires pour booster vos performances.',
				'auteur' => 2,
				'image' => 'alimentation-sport.jpg',
				'type' => 'blog',
			],
			[
				'titre' => 'Programme d’entraînement pour débutants',
				'contenu' => 'Un guide étape par étape pour ceux qui débutent en salle de sport.',
				'auteur' => 2,
				'image' => null,
				'type' => 'blog',
			],
			[
				'titre' => 'Compétition 01/25',
				'contenu' => 'Je vais participer à un concours de musculation en janvier 2025.',
				'auteur' => 1,
				'image' => null,
				'type' => 'actu',
			],
		];

		$this->db->table('article')->insertBatch($data);
	}
}
