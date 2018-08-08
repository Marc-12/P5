<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercicesTable extends Migration
{
   
    public function up()
    {
		Schema::create('exercices', function (Blueprint $table) 
		{
			$table->increments('id');
			$table->string('name_ex');
			$table->string('subject_ex');
			$table->string('level_ex');
			$table->string('id_Seance_ex');
			$table->string('id_Sequence_ex');
			$table->string('domaine_ex');
			$table->string('difficulty_ex');
			$table->string('competence_ex');
			$table->string('type_ex');
			$table->string('Jsondata_ex');
			$table->timestamps();
		});
	}
    public function down()
    {
        Schema::drop('exercices');
    }
}
