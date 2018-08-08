<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Ajax extends Model
{
    // nom de la table que le model va gérer
	//
	//
	//
	protected $table = 'user_infos';
	// protected $table = 'users';
	
	// pas de gestion du temps pour cette table
	// car pas nécessaire pour cette table
	public $timestamps = false;
	

}
