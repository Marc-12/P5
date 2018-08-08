<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_Infos', function(Blueprint $table) {
		$table->string( 'id_User_Info' );
		$table->string( 'age_User_Info' );
		$table->string( 'gender_User_Info' );
		$table->string( 'class_User_Info' );
		$table->string( 'maxNumber_User_Info' );
		$table->string( 'app_Level_User_Info' );
		$table->string( 'token_User_Info' );
		$table->string( 'settings_User_Info' );
		$table->softDeletes();		
		} );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('User_Infos');
    }
}
