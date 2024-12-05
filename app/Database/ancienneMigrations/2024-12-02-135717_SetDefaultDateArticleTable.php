<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SetDefaultDateArticleTable extends Migration
{
	public function up()
	{
		$this->db->query("ALTER TABLE article ALTER COLUMN date_publi SET DEFAULT CURRENT_DATE");
	}

	public function down()
	{
		$this->db->query("ALTER TABLE article ALTER COLUMN date_publi SET DEFAULT NULL");
	}
}
