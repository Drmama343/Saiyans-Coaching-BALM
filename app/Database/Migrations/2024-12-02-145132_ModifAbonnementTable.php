<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifAbonnementTable extends Migration
{
	public function up()
	{
		$this->db->query('DROP TABLE IF EXISTS abonnement CASCADE');

		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'nom' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
			'photo' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			],
			'description' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'prix' => [
				'type'       => 'FLOAT',
				'null'       => false,
			],
			'entrainement' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
			'multimedia' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
			'alimentaire' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
			'bilan' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
			'whatsapp' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('abonnement');
	}

	public function down()
	{
		$this->db->query('DROP TABLE IF EXISTS abonnement CASCADE');
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'entrainement' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
			'multimedia' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
			'alimentaire' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
			'bilan' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
			'whatsapp' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('abonnement');
	}
}
