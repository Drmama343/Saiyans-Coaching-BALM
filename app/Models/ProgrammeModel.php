<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgrammeModel extends Model {
	protected $table = 'produit';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nom', 'description', 'prix', 'duree', 'image', 'entrainement', 'multimedia', 'alimentaire', 'bilan', 'whatsapp'];
}