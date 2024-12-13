<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QuestionSeeder extends Seeder
{
	
	public function run()
	{
		$this->db->query('TRUNCATE TABLE question RESTART IDENTITY CASCADE');

		$data = [
			[
				'question' => 'Comment devenir musclé ?',
				'reponse' => 'Il faut de la motivation et suivre mes formations.',
			],
			[
				'question' => 'Que ne faut-il pas manger pour ne pas perdre ses gains?',
				'reponse' => 'Ne mange pas de malbouffe tout les jours et réduit ta consommation d\'alcool.',
			],
			[
				'question' => 'Combien de temps faut-il pour voir des résultats ?',
				'reponse' => 'Cela dépend de votre assiduité, mais en général entre 4 à 8 semaines.',
			],
			[
				'question' => 'Puis-je faire de la musculation chez moi ?',
				'reponse' => 'Oui, avec les bons exercices et équipements, c\'est tout à fait possible.',
			],
			[
				'question' => 'Faut-il arrêter les glucides pour perdre du poids ?',
				'reponse' => 'Non, les glucides sont nécessaires pour l\'énergie. Il faut juste en consommer avec modération.',
			],
			[
				'question' => 'Est-ce que les compléments alimentaires sont indispensables ?',
				'reponse' => 'Non, mais ils peuvent aider à atteindre vos objectifs plus rapidement.',
			],
		];

		$this->db->table('question')->insertBatch($data);
	}
}
