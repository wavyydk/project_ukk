<?php

namespace App\Models;

use CodeIgniter\Model;

class foto extends Model
{

	protected $table 			= 'foto';
	protected $primaryKey 		= 'foto_id';
	protected $returnType 		= 'object';
	protected $protectFields 	= false;
	protected $allowedFields 	= [];

}