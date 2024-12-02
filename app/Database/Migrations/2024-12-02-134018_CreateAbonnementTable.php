<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAbonnementTable extends Migration
{
	public function up()
	{
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

	public function down()
	{
		$this->forge->dropTable('abonnement');
	}
}