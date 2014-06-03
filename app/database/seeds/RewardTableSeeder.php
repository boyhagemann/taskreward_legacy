<?php

class RewardTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Reward::create(array(
			'user_id' => 1,
			'task_id' => 2,
			'token_id' => 3,
			'value' => 100,
			'currency' => 'EUR',
		));

		Reward::create(array(
			'user_id' => 1,
			'task_id' => 3,
			'token_id' => 4,
			'value' => 46,
			'currency' => 'EUR',
		));
	}

}