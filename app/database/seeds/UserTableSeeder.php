<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Sentry::createUser(array(
			'email' => 'test@test.nl',
            'password' => 'test',
            'person_id' => 1,
            'activated' => true,
		));
        
		Sentry::createUser(array(
			'email' => 'test2@test2.nl',
            'password' => 'test',
            'parent_user_id' => 1,
            'person_id' => 2,
            'activated' => true,
		));
	}

}
