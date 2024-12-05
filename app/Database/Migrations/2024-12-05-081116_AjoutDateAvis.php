<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AjoutDateAvis extends Migration
{
    public function up()
    {
        // Ajouter une nouvelle colonne `date` à la table `avis`
        $this->forge->addColumn('avis', [
            'date' => [
                'type' => 'DATE',
                'null' => false,
            ],
        ]);
    }

    public function down()
    {
        // Supprimer la colonne `date` si la migration est annulée
        $this->forge->dropColumn('avis', 'date');
    }
}
