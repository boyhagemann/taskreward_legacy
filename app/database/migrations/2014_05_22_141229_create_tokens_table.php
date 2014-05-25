<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tokens', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->integer('task_id');
			$table->integer('user_id');
			$table->string('key');
            $table->enum('status', array('active', 'inactive', 'accepted'));

			$table->unique(array('task_id', 'user_id'));
			$table->unique('key');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tokens');
	}

}
