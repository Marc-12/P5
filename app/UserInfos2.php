<?php

namespace App;
// namespace Illuminate\Database\Schema;
use Illuminate\Database\Eloquent\Model;

class UserInfos2 extends Model
{
	//
	const CP = 0;
	const CE1 = 1;
	const CE2 = 2; 
	const CM1 = 3; 
	const CM2 = 5; 
	const SIXIEME = 6;
	
    protected $table = 'user_infos';
	// public $timestamps = false;
}
