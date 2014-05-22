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
			$table->string('uid');
			$table->string('task');
			$table->string('reward');
			$table->string('product_title');
			$table->text('product_description');
			$table->string('product_uri');
			$table->integer('value');
			$table->string('unit');

			$table->unique(array('provider_id', 'uid'));
			$table->index('reward');
			$table->index('unit');

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
