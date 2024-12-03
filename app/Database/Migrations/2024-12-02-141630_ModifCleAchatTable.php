<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifCleAchatTable extends Migration
{
    public function up()
    {
		$this->db->query('ALTER TABLE achat ADD PRIMARY KEY ("idsaiyan", "idproduit")');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE achat ADD PRIMARY KEY ("idsaiyan")');
    }
}
