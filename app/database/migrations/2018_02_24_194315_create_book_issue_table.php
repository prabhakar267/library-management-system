<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookIssueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_issue', function(Blueprint $table)
		{
			$table->increments('issue_id');

            $table->integer('book_id');
            $table->tinyInteger('available_status')->default(1);
            $table->integer('added_by')->unsigned();

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
		Schema::drop('book_issue');
	}

}
