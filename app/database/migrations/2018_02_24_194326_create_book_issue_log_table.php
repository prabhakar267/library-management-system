<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookIssueLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_issue_log', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('book_issue_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('issue_by')->unsigned();
            $table->string('issued_at', 50);
            $table->string('return_time', 50);

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
		Schema::drop('book_issue_log');
	}

}
