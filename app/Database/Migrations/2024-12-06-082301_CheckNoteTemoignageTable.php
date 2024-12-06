<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CheckNoteTemoignageTable extends Migration
{
	public function up()
	{
		$this->db->query("ALTER TABLE temoignage ADD CONSTRAINT check_note_temoignage CHECK (note IN (1, 2, 3, 4, 5))");
	}

	public function down()
	{
		$this->db->query("ALTER TABLE temoignage DROP CONSTRAINT check_note_temoignage");
	}
}
