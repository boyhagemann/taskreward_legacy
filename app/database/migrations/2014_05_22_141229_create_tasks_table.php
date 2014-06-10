<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->integer('provider_id');
			$table->enum('action', array('sell', 'recruit'));
			$table->string('key');
			$table->string('uid');
			$table->string('title');
			$table->text('teaser');
			$table->text('description');
			$table->text('uri');
			$table->string('image');
			$table->float('value');
			$table->string('currency');

			$table->unique(array('provider_id', 'uid'));
			$table->unique('key');
			$table->index('action');
			$table->index('value');
			$table->index('currency');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
