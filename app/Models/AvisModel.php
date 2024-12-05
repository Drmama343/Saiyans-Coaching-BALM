<?php

namespace App\Models;

use CodeIgniter\Model;

class AvisModel extends Model {
	protected $table = 'avis';
	protected $primaryKey = 'idachat';
	protected $allowedFields = ['note', 'temoignage', 'date'];
}