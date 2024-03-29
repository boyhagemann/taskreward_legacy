<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rewards', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->string('uid');
			$table->integer('user_id');
			$table->integer('task_id');
			$table->integer('payment_id')->nullable();
            $table->float('value');
            $table->string('currency');

			$table->unique('uid');
			$table->index('user_id');
            $table->index('task_id');
            $table->index('payment_id');
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
		Schema::drop('rewards');
	}

}
