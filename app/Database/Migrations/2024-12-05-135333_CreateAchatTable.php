<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id' => [
                'type'       => 'INT',
                'auto_increment' => true,
            ],
            'idsaiyan' => [
                'type'       => 'INT',
                'null'       => false,
            ],
            'idproduit' => [
                'type'       => 'INT',
                'null'       => false,
            ],
            'date' => [
                'type' => 'DATE',
                'null' => false,
            ],
			'echeance' => [
                'type' => 'DATE',
                'null' => false,
            ],
        ]);

		$this->forge->addKey('id', true);
        $this->forge->addForeignKey('idsaiyan', 'saiyan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('idproduit', 'produit', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('achat');
    }

    public function down()
    {
        $this->forge->dropTable('achat');
    }
}
