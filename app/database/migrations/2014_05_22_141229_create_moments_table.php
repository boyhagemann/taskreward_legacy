<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMomentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('moments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->integer('action_id');
            $table->integer('user_id')->nullable();
            $table->integer('task_id')->nullable();
            $table->integer('token_id')->nullable();
            $table->integer('reward_id')->nullable();
			$table->longText('params')->nullable();

			$table->index('action_id');
			$table->index('user_id');
			$table->index('task_id');
			$table->index('token_id');
			$table->index('reward_id');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('moments');
	}

}
