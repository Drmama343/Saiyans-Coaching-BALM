<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model {
	protected $table = 'promotion';
	protected $primaryKey = 'id';
	protected $allowedFields = ['id', 'date_deb', 'date_fin', 'reduction', 'code', 'nb_utilisation', 'produit'];
}