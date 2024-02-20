<?php

namespace App\Models;

use CodeIgniter\Model;

class komentar extends Model
{

	protected $table 			= 'komentar_foto';
	protected $primaryKey 		= 'komentar_id';
	protected $returnType 		= 'object';
	protected $protectFields 	= false;
	protected $allowedFields 	= [];
}
