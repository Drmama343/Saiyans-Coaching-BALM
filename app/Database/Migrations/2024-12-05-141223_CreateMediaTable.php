<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMediaTable extends Migration
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
			'media' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
			'type' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
		]);

		$this->forge->addKey('id', true); // Primary key
		$this->forge->createTable('media');

		$this->db->query("ALTER TABLE article ALTER COLUMN date_publi SET DEFAULT CURRENT_DATE");
	}

	public function down()
	{
		$this->forge->dropTable('media');

		$this->db->query("ALTER TABLE article ALTER COLUMN date_publi SET DEFAULT NULL");
	}
}
