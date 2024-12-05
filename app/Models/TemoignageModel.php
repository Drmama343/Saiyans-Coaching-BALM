<?php

namespace App\Models;

use CodeIgniter\Model;

class TemoignageModel extends Model {
	protected $table = 'temoignage';
	protected $primaryKey = 'id';
	protected $allowedFields = ['contenu','note','date','image','affichage'];
}