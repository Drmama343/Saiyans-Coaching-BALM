<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DeglingueAchatsTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('achat', true);

        $this->forge->addField([
            'idachat'    => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'idsaiyan'   => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'idproduit'  => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'date'       => [
                'type'       => 'DATE',
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('idachat', true);
        $this->forge->addForeignKey('idsaiyan', 'saiyan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('idproduit', 'produit', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('achat', true);
    }

    public function down()
    {
        $this->forge->dropTable('achat', true);

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
        $this->db->query('ALTER TABLE achat ADD PRIMARY KEY ("idsaiyan", "idproduit")');
    }
}



/*
 * rajouter un id aux achats
 * ajouter un table avis qui est relié à un achat afin de simplifier la récup
 * modif modif
 */ 