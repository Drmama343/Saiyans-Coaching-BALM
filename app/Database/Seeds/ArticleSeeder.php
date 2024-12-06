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
				'auteur' => 1,
				'image' => 'alimentation-sport.jpg',
				'type' => 'blog',
			],

			[
				'titre' => 'Programme d’entraînement pour débutants',
				'contenu' => 'Un guide étape par étape pour ceux qui débutent en salle de sport.',
				'auteur' => 1,
				'image' => 'entrainement-debutants.jpg',
				'type' => 'blog',
			],
			[
				'titre' => 'Les erreurs courantes en musculation',
				'contenu' => 'Apprenez à éviter les erreurs qui freinent vos progrès.',
				'auteur' => 1,
				'image' => 'erreurs-musculation.jpg',
				'type' => 'actu',
			],
			[
				'titre' => 'Compléments alimentaires : utiles ou non ?',
				'contenu' => 'Une analyse des compléments alimentaires et de leur efficacité.',
				'auteur' => 1,
				'image' => 'complements-alimentaires.jpg',
				'type' => 'actu',
			],
			[
				'titre' => 'S’entraîner chez soi : astuces et équipements',
				'contenu' => 'Les meilleurs conseils pour rester en forme à la maison.',
				'auteur' => 1,
				'image' => 'entrainement-chez-soi.jpg',
				'type' => 'actu',
			],
		];

		$this->db->table('article')->insertBatch($data);
	}
}
