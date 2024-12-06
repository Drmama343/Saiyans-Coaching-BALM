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
				'adresse' => json_encode(['rue' => '123 rue de Sport', 'ville' => 'Paris', 'code_postal' => '75001']),
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
				'adresse' => json_encode(['rue' => '65 rue Casimir Delavigne', 'ville' => 'Le Havre', 'code_postal' => '76600']),
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
				'nom' => 'Smith',
				'prenom' => 'Anna',
				'mail' => 'anna.smith@sfr.fr',
				'mdp' => password_hash('pwdAnna', PASSWORD_DEFAULT),
				'adresse' => json_encode(['rue' => '789 boulevard Leningrad', 'ville' => 'Le Havre', 'code_postal' => '76610']),
				'tel' => '1112131415',
				'sexe' => 'F',
				'admin' => false,
				'age' => 36,
				'taille' => 165,
				'poids' => 60,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
		];

		$this->db->table('saiyan')->insertBatch($data);
	}
}
