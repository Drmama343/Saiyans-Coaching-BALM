<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifPoidsSaiyanTable extends Migration
{
    public function up()
    {
		$this->db->query("ALTER TABLE saiyan RENAME COLUMN poid TO poids");
    }

    public function down()
    {
		$this->db->query("ALTER TABLE saiyan RENAME COLUMN poids TO poid");
    }
}
