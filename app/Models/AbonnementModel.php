<?php

namespace App\Models;

use CodeIgniter\Model;

class AbonnementModel extends Model {
	protected $table = 'abonnement';
	protected $primaryKey = 'id';
	protected $allowedFields = ['id', 'nom', 'photo', 'description', 'prix', 'entrainement', 'multimedia', 'alimentaire', 'bilan', 'whatsapp'];
}