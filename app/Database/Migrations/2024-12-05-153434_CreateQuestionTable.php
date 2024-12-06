<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuestionTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'question' => [
				'type'       => 'TEXT',
				'null'       => false,
			],
			'reponse' => [
				'type'       => 'TEXT',
				'null'       => false,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('question');
	}

	public function down()
	{
		$this->forge->dropTable('question');
	}
}
