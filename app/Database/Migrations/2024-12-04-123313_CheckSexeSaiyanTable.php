<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CheckSexeSaiyanTable extends Migration
{
	public function up()
	{
		$this->db->query("ALTER TABLE saiyan ADD CONSTRAINT check_sexe CHECK (sexe IN ('H', 'F'))");
	}

	public function down()
	{
		$this->db->query("ALTER TABLE saiyan DROP CONSTRAINT check_sexe");
	}
}
