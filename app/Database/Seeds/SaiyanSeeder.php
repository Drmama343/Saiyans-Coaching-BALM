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
			[
				'nom' => 'Dupont',
				'prenom' => 'Marie',
				'mail' => 'marie.dupont@gmail.com',
				'mdp' => password_hash('Marie123', PASSWORD_DEFAULT),
				'adresse' => json_encode(['rue' => '15 avenue du Général Leclerc', 'ville' => 'Rouen', 'code_postal' => '76000']),
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
				'nom' => 'Carter',
				'prenom' => 'John',
				'mail' => 'john.carter@yahoo.com',
				'mdp' => password_hash('JCarter!42', PASSWORD_DEFAULT),
				'adresse' => json_encode(['rue' => '11 rue Lafayette', 'ville' => 'Caen', 'code_postal' => '14000']),
				'tel' => '0789564123',
				'sexe' => 'H',
				'admin' => false,
				'age' => 40,
				'taille' => 182,
				'poids' => 85,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
			[
				'nom' => 'Lopez',
				'prenom' => 'Sofia',
				'mail' => 'sofia.lopez@gmail.com',
				'mdp' => password_hash('SofiaL23', PASSWORD_DEFAULT),
				'adresse' => json_encode(['rue' => '67 rue des Lilas', 'ville' => 'Lyon', 'code_postal' => '69003']),
				'tel' => '0654789632',
				'sexe' => 'F',
				'admin' => true,
				'age' => 29,
				'taille' => 168,
				'poids' => 58,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
			[
				'nom' => 'Yamamoto',
				'prenom' => 'Akira',
				'mail' => 'akira.yamamoto@gmail.com',
				'mdp' => password_hash('AkiraPower12', PASSWORD_DEFAULT),
				'adresse' => json_encode(['rue' => '88 avenue Sakura', 'ville' => 'Tokyo', 'code_postal' => '100001']),
				'tel' => '0891234567',
				'sexe' => 'H',
				'admin' => false,
				'age' => 35,
				'taille' => 175,
				'poids' => 70,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
			[
				'nom' => 'Dubois',
				'prenom' => 'Claire',
				'mail' => 'claire.dubois@gmail.com',
				'mdp' => password_hash('ClaireDubois89', PASSWORD_DEFAULT),
				'adresse' => json_encode(['rue' => '21 rue de la Forêt', 'ville' => 'Nantes', 'code_postal' => '44000']),
				'tel' => '0723456789',
				'sexe' => 'F',
				'admin' => false,
				'age' => 42,
				'taille' => 160,
				'poids' => 55,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
			[
				'nom' => 'Nguyen',
				'prenom' => 'Minh',
				'mail' => 'minh.nguyen@hotmail.com',
				'mdp' => password_hash('MinhNguyen22', PASSWORD_DEFAULT),
				'adresse' => json_encode(['rue' => '34 rue des Palmiers', 'ville' => 'Ho Chi Minh Ville', 'code_postal' => '700000']),
				'tel' => '0912345678',
				'sexe' => 'H',
				'admin' => true,
				'age' => 28,
				'taille' => 180,
				'poids' => 75,
				'reset_token' => null,
				'reset_token_expiration' => null,
			],
		];

		$this->db->table('saiyan')->insertBatch($data);
	}
}
