<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create(array(
			'first_name' => 'First',
			'last_name' => 'User',
		));
        
		User::create(array(
			'first_name' => 'Second',
			'last_name' => 'User',
		));
	}

}
