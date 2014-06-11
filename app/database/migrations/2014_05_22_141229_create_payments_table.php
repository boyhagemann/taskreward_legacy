<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->integer('user_id');
			$table->enum('status', ['requested', 'accepted', 'payed']);
            $table->float('value');
            $table->string('currency');

			$table->index('user_id');
            $table->index('status');
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
		Schema::drop('payments');
	}

}
