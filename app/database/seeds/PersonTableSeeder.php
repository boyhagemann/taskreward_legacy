<?php

class PersonTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Person::create(array(
			'first_name' => 'First',
			'last_name' => 'User',
		));
        
		Person::create(array(
			'first_name' => 'Second',
			'last_name' => 'User',
		));
	}

}
