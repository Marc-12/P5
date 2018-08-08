<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	protected $fillable = ['name', 'email', 'password', 'admin'];
	
    protected $hidden = [
        'password', 'remember_token',
    ];
	public function userInfos ()
	{
		return $this->hasOne(UserInfos2::class, 'id_user_infos');
	}	
	// PARTIE ADMIN
	// this looks for an admin column in your users table
	public function isAdmin()
	{
		return $this->admin; 
	}
}
