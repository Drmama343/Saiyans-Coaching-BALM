<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model {
	protected $table = 'achat';
	protected $primaryKey = '';
	protected $allowedFields = ['idsaiyan', 'idproduit', 'note', 'date', 'temoignage'];
}