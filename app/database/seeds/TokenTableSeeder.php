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
			'user_id' => 1,
			'task_id' => 2,
			'key' => 'token1',
			'status' => 'accepted',
		));

		Token::create(array(
			'user_id' => 1,
			'task_id' => 3,
			'key' => 'token2',
			'status' => 'accepted',
		));
	}

}
