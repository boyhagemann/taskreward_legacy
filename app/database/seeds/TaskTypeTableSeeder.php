<?php

class TaskTypeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{        
		TaskType::create(array(
			'title' => 'Recruit people',
			'description' => 'A description that explains the task',
		));

		TaskType::create(array(
			'title' => 'Sell this product',
			'description' => 'A description that explains the task',
		));

	}

}
