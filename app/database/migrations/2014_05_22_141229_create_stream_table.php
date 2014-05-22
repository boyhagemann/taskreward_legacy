<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stream', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->string('message');
            $table->integer('account_id')->nullable();
            $table->integer('action_id');
            $table->longText('data');

			$table->index('account_id');
			$table->index('action_id');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stream');
	}

}
