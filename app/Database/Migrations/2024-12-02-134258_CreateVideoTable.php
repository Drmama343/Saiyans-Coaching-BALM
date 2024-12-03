<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVideoTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'titre' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
			'description' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			],
			'video' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
		]);

		$this->forge->addKey('id', true); // Primary key
		$this->forge->createTable('video');
	}

	public function down()
	{
		$this->forge->dropTable('video');
	}
}
