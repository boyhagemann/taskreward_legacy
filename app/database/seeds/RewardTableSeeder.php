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
			'uid' => 'test1',
			'user_id' => 1,
			'task_id' => 2,
			'value' => 100,
			'currency' => 'EUR',
		));

		Reward::create(array(
			'uid' => 'test2',
			'user_id' => 1,
			'task_id' => 3,
			'value' => 46,
			'currency' => 'EUR',
		));
	}

}
