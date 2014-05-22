<?php

class TokenTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Token::create(array(
			'task_id' => 1,
			'account_id' => 1,
		));
	}

}
