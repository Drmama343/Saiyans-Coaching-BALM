<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifProduitsTable extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('produit', 'produit');

        $fields = [
			'produits' => [
				'type'       => 'INTEGER[]',
				'null'       => true,
			],
		];
		$this->forge->addColumn('produit', $fields);
    }

    public function down()
    {
		$this->forge->dropColumn('produit', 'photo');

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
