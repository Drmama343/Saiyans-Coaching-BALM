<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FloatPoidsSaiyanTable extends Migration
{
    public function up()
    {
		$this->db->query("ALTER TABLE saiyan ALTER COLUMN poids SET DATA TYPE FLOAT");
    }

    public function down()
    {
        $this->db->query("ALTER TABLE saiyan ALTER COLUMN poids SET DATA TYPE INT");
    }
}
