<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->string('email');
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->integer('parent_user_id')->nullable();
			$table->integer('person_id')->nullable();

			$table->unique('email');
			$table->index('password');
			$table->index('remember_token');
			$table->index('parent_user_id');
			$table->index('person_id');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
