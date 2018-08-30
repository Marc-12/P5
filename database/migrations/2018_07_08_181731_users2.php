<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users2 extends Migration
{
     public function up()
    {
		Schema::create('user_infos', function(Blueprint $table) {
		$table->increments('id');
		$table->integer( 'id_user_infos' );
		$table->integer( 'age_user_infos' );
		$table->integer( 'gender_user_infos' );
		$table->integer( 'class_user_infos' );
		$table->integer( 'maxNumber_user_infos' );
		$table->integer( 'app_Level_user_infos' );
		$table->integer( 'difficulty_user_infos' );
			$table->text('work_user_infos');
		$table->string( 'displaySettings_user_infos' );
		$table->string( 'token_user_infos' );	
		$table->timestamps();         		
		} );
    }
    public function down()
    {
		Schema::drop('user_infos');		
    }
}
