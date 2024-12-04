<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticleTable extends Migration
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
			'contenu' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'auteur' => [
				'type'       => 'INT',
				'null'       => false,
			],
			'date_publi' => [
				'type'    => 'DATE',
				'null'    => true,
			],
			'image' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			],
		]);

		$this->forge->addKey('id', true); // Primary key
		$this->forge->addForeignKey('auteur', 'saiyan', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('article');
	}

	public function down()
	{
		$this->forge->dropTable('article');
	}
}
