<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('student_id');

            $table->string('first_name', 512);
            $table->string('last_name', 512);
            $table->tinyInteger('approved')->default(0);
            $table->tinyInteger('rejected')->default(0);
            $table->integer('category')->unsigned();
            $table->string('roll_num', 15);
            $table->tinyInteger('branch')->default(0);
            $table->integer('year')->unsigned();
            $table->tinyInteger('books_issued')->default(0);
            $table->string('email_id', 512);

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
		Schema::drop('students');
	}

}
