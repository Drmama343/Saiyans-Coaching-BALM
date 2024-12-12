<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SaiyanSeeder extends Seeder
{
	public function run()
	{
		$this->db->query('TRUNCATE TABLE saiyan RESTART IDENTITY CASCADE');

		$data = [
			[
				'nom' => 'Lecarpentier',
				'prenom' => 'Luc',
				'mail' => 'luc.lecarpentier5@gmail.com',
				'mdp' => password_hash('Motdepasse1', PASSWORD_DEFAULT),
				'adresse' => json_encode(['query' => '123 rue de Sport Paris 75001']),
				'tel' => '0102030405',
				'sexe' => 'H',
				'admin' => true,
				'age' => 26,
				'taille' => 160,
				'poids' => 95,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
			[
				'nom' => 'Hay',
				'prenom' => 'Baptiste',
				'mail' => 'baptiste.hay@hotmail.fr',
				'mdp' => password_hash('MaisTesPasNet', PASSWORD_DEFAULT),
				'adresse' => json_encode(['query' => '65 rue Casimir Delavigne Le Havre 76600']),
				'tel' => '0640129938',
				'sexe' => 'H',
				'admin' => true,
				'age' => 21,
				'taille' => 178,
				'poids' => 72.8,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
			[
				'nom' => 'Dupont',
				'prenom' => 'Marie',
				'mail' => 'marie.dupont@gmail.com',
				'mdp' => password_hash('Marie123', PASSWORD_DEFAULT),
				'adresse' => json_encode(['query' => '789 boulevard Leningrad Le Havre 76610']),
				'tel' => '0765432198',
				'sexe' => 'F',
				'admin' => false,
				'age' => 30,
				'taille' => 170,
				'poids' => 65,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
			[
				'nom' => 'Dubois',
				'prenom' => 'Claire',
				'mail' => 'claire.dubois@gmail.com',
				'mdp' => password_hash('ClaireDubois89', PASSWORD_DEFAULT),
				'adresse' => json_encode(['query' => '789 boulevard Leningrad Le Havre 76610']),
				'tel' => '0723456789',
				'sexe' => 'F',
				'admin' => false,
				'age' => 42,
				'taille' => 160,
				'poids' => 55,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
		];

		$this->db->table('saiyan')->insertBatch($data);
	}
}
