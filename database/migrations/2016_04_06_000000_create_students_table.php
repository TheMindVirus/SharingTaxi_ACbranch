<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('studentPk');
			$table->string('studentId')->unique();
			$table->string('firstName');
			$table->string('surname');
			$table->string('campus');
			$table->string('prifileImage');
			$table->boolean('confirmed')->default(0);
			$table->string('confirmation_code');
			$table->string('password',60);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('students');
	}
}