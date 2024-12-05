<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AvisSeeder extends Seeder
{
    public function run()
    {
        $data = [
			[
				'idachat' => 1,
				'note' => 4,
                'temoignage' => 'Programme complet et coach à l\'écoute',
				'date' => '2024-01-02',
			],
			[
				'idachat' => 2,
				'note' => 5,
                'temoignage' => 'Parfait',
				'date' => '2024-03-01',
			],
		];

		$this->db->table('avis')->insertBatch($data);
    }
}
