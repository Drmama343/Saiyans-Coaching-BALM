<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAffichageArticleTable extends Migration
{
	public function up()
	{
		$fields = [
			'affichage' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
		];
		$this->forge->addColumn('article', $fields);

		$this->db->query("ALTER TABLE article ALTER COLUMN affichage SET DEFAULT TRUE");
	}

	public function down()
	{
		$this->forge->dropColumn('article', 'affichage');
		
		$this->db->query("ALTER TABLE article ALTER COLUMN affichage SET DEFAULT NULL");
	}
}
