<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SaiyanSeeder extends Seeder
{
	public function run()
	{
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
				'abonnement' => 1,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
			[
				'nom' => 'Hay',
				'prenom' => 'Baptiste',
				'mail' => 'baptiste.hay@hotmail.fr',
				'mdp' => password_hash('MaisTesPasNet', PASSWORD_DEFAULT),
				'adresse' => json_encode(['rue' => '456 avenue Fitness', 'ville' => 'Lyon', 'code_postal' => '69002']),
				'tel' => '0607080910',
				'sexe' => 'H',
				'admin' => true,
				'age' => 28,
				'taille' => 185,
				'poids' => 70,
				'abonnement' => 2,
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
				'abonnement' => 2,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
		];

		$this->db->table('saiyan')->insertBatch($data);
	}
}
