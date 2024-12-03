<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model {
	protected $table = 'video';
	protected $primaryKey = 'id';
	protected $allowedFields = ['id', 'titre', 'description', 'video'];
}