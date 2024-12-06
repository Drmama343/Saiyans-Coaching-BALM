<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTypeArticleTable extends Migration
{
	public function up()
	{
		$fields = [
			'type' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => false,
			],
		];
		$this->forge->addColumn('article', $fields);

		$this->db->query("ALTER TABLE article ADD CONSTRAINT check_type_article CHECK (type IN ('blog', 'actu'))");
	}

	public function down()
	{
		$this->forge->dropColumn('article', 'type');
		
		$this->db->query("ALTER TABLE article DROP CONSTRAINT check_type_article");
	}
}
