<?php

class TaskTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Task::create(array(
			'provider_id' => 1,
			'title' => 'Get people to join',
			'description' => 'A description',
			'task' => 'Get people to join',
			'reward' => '9% of their sales',
			'unit' => '',
		));
	}

}
