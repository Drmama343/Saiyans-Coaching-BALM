<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idsaiyan' => [
                'type'       => 'INT',
                'null'       => false,
            ],
            'idproduit' => [
                'type'       => 'INT',
                'null'       => false,
            ],
            'note' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'temoignage' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);

        $this->forge->addForeignKey('idsaiyan', 'saiyan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('idproduit', 'produit', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('achat');
    }

    public function down()
    {
        $this->forge->dropTable('achat');
    }
}
