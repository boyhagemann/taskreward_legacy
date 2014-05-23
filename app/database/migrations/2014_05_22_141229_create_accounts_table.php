<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->string('email');
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->integer('parent_account_id')->nullable();
			$table->integer('user_id')->nullable();

			$table->unique('email');
			$table->index('password');
			$table->index('remember_token');
			$table->index('parent_account_id');
			$table->index('user_id');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
