<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSaiyanTable extends Migration
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
			'prenom' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
			'mail' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
			'mdp' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
			'adresse' => [
				'type' => 'JSON',
				'null' => true,
			],
			'tel' => [
				'type'       => 'VARCHAR',
				'constraint' => 20,
				'null'       => true,
			],
			'sexe' => [
				'type'       => 'VARCHAR',
				'constraint' => 10,
				'null'       => false,
			],
			'admin' => [
				'type'       => 'BOOLEAN',
				'null'       => false,
			],
			'age' => [
				'type'       => 'INT',
				'null'       => false,
			],
			'taille' => [
				'type'       => 'INT',
				'null'       => false,
			],
			'poid' => [
				'type'       => 'INT',
				'null'       => false,
			],
			'abonnement' => [
				'type' => 'INT',
				'null' => true,
			],
			'reset_token' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			],
			'reset_token_expiration' => [
				'type' => 'TIMESTAMP',
				'null' => true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('abonnement', 'abonnement', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('saiyan');
	}

	public function down()
	{
		$this->forge->dropTable('saiyan');
	}
}