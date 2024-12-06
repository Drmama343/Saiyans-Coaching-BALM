<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduitTable extends Migration
{
	public function up()
	{
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
			'description' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'prix' => [
				'type'       => 'FLOAT',
				'null'       => false,
			],
			'duree' => [
				'type'       => 'INT',
				'null'       => false,
			],
			'photo' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
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

		$this->forge->addKey('id', true); // Primary key
		$this->forge->createTable('produit');
	}

	public function down()
	{
		$this->forge->dropTable('produit');
	}
}