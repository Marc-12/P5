<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOneTable extends Migration
{
     public function up()
    {
        Schema::create('one', function(Blueprint $table) {
			$table->increments('id');
			$table->string( 'id_user_infos' );
			$table->string( 'age_user_infos' );
			$table->string( 'gender_user_infos' );
			$table->string( 'class_user_infos' );
			$table->string( 'maxNumber_user_infos' );
			$table->string( 'app_Level_user_infos' );
			$table->string( 'settings_user_infos' );
			$table->string( 'token_user_infos' );
			$table->timestamps();			
		} );
    }
    public function down()
    {
        Schema::drop('one');
    }
	
}
