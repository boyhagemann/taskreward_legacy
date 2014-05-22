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
			'uid' => 'uid1',
			'product_title' => 'Samsung TV',
			'product_description' => 'Nice TV',
			'product_uri' => 'http://www.google.com',
			'task' => 'Get people to buy this product',
			'reward' => '100 euro',
			'value' => 100,
			'unit' => 'EUR',
		));
	}

}
