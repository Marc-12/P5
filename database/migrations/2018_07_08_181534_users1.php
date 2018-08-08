<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users1 extends Migration
{
   public function up()
    {
			Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name')->unique();
			$table->string('email')->unique();
			$table->string('password', 120);
			$table->boolean('admin')->default(false);
			$table->rememberToken();
			$table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('users');
    }
	
}
