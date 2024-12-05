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
		];

		$this->db->table('question')->insertBatch($data);
	}
}
