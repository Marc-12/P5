<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User2 extends Migration
{
     public function up()
    {
        Schema::create('user_infos', function(Blueprint $table) {
		$table->increments('id');
		$table->string( 'id_user_infos' );
		$table->string( 'age_user_infos' );
		$table->string( 'gender_user_infos' );
		$table->string( 'class_user_infos' );
		$table->string( 'maxNumber_user_infos' );
		$table->string( 'app_Level_user_infos' );
		$table->string( 'displaySettings_user_infos' );
		$table->string( 'token_user_infos' );
		$table->softDeletes();		
		} );
    }
    public function down()
    {
        Schema::drop('user_infos');
    }
}
