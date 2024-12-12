<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTemoignageTable extends Migration
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
            'temoignage' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
			'note' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'date' => [
                'type' => 'DATE',
                'null' => false,
            ],
			'image' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			],
			'affichage' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
        ]);

		$this->forge->addKey('id', true);
        $this->forge->addForeignKey('idsaiyan', 'saiyan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('temoignage');
    }

    public function down()
    {
        $this->forge->dropTable('temoignage');
    }
}
