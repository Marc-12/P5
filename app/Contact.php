<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'user_contacts';
	// public $timestamps = true;
	
	public function getFullNameAttribute()
	{
		return $this->prenom_user_contacts.' '.$this->nom_user_contacts;
	}
}
