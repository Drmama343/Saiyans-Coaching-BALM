<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAffichageMediaTable extends Migration
{
	public function up()
	{
		$fields = [
			'affichage' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
		];
		$this->forge->addColumn('media', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('media', 'affichage');
	}
}
