<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactUsers extends Migration
{
    public function up()
    {
        Schema::create('user_contacts', function(Blueprint $table) 
		{
			$table->increments( 'id' )->primary('id');
			$table->string( 'id_User_Contacts' );
			$table->string('objet_User_Contacts');
			$table->string('prenom_User_Contacts');
			$table->string('nom_User_Contacts');
			$table->string('message_user_contacts');
			$table->timestamps();	
		});
    }
    public function down()
    {
		Schema::drop('user_contacts');
    }
}
