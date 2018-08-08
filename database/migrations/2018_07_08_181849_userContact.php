<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserContact extends Migration
{
  public function up()
    {
		Schema::create('user_contacts', function(Blueprint $table) 
		{
			$table->increments( 'id' );
			$table->string( 'id_user_contacts' );
			$table->string('objet_user_contacts');
			$table->string('prenom_user_contacts');
			$table->string('nom_user_contacts');
			$table->string('message_user_contacts');
			$table->timestamps();	
		});
    }
    public function down()
    {
        		Schema::drop('user_contacts');
    }	
}
