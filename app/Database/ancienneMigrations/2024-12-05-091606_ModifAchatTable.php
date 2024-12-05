<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifAchatTable extends Migration
{
    public function up()
    {
        // Supprimer la table `achat`
        $this->db->query('DROP TABLE IF EXISTS achat CASCADE');

        // Recréer la table `achat`
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
        // Supprimer la table `achat`
        $this->db->query('DROP TABLE IF EXISTS achat CASCADE');

        // Recréer la table `avis`
        $this->forge->addField([
            'idachat' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'note' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'temoignage' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('idachat', true);
        $this->forge->addForeignKey('idachat', 'achat', 'idachat', 'CASCADE', 'CASCADE');
        $this->forge->createTable('avis', true);
    }
}