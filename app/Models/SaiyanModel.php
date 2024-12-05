<?php

namespace App\Models;

use CodeIgniter\Model;

class SaiyanModel extends Model {
	protected $table = 'saiyan';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nom', 'prenom', 'mail', 'mdp', 'adresse', 'tel', 'sexe', 'admin', 'age', 'taille', 'poids', 'reset_token', 'reset_token_expiration'];
}