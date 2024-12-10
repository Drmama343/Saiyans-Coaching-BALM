<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DelPhotoProduitTable extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('produit', 'photo');
    }

    public function down()
    {
        $fields = [
			'photo' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			],
		];
		$this->forge->addColumn('produit', $fields);
    }
}
