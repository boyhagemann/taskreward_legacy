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
			$table->integer('task_type_id');
			$table->string('key');
			$table->string('uid');
			$table->string('title');
			$table->text('description');
			$table->string('uri');
			$table->float('value');
			$table->string('currency');

			$table->unique(array('provider_id', 'uid'));
			$table->unique('key');
			$table->index('task_type_id');
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
