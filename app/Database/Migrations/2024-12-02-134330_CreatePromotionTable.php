<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePromotionTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'date_deb' => [
				'type' => 'DATE',
				'null' => false,
			],
			'date_fin' => [
				'type' => 'DATE',
				'null' => false,
			],
			'reduction' => [
				'type' => 'INT',
				'null' => true,
			],
			'code' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
			'nb_utilisation' => [
				'type' => 'INT',
				'null' => true,
			],
			'produit' => [
				'type'       => 'INT',
				'null'       => true,
			],
			'abonnement' => [
				'type'       => 'INT',
				'null'       => true,
			],
		]);

		$this->forge->addKey('id', true); // Primary key
		$this->forge->addForeignKey('produit', 'produit', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('abonnement', 'abonnement', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('promotion');
	}

	public function down()
	{
		$this->forge->dropTable('promotion');
	}
}

