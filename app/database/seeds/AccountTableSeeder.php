<?php

class AccountTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Account::create(array(
			'email' => 'test@test.nl',
            'password' => Hash::make('test'),
            'user_id' => 1,
		));
        
		Account::create(array(
			'email' => 'test2@test2.nl',
            'password' => Hash::make('test'),
            'parent_account_id' => 1,
            'user_id' => 2,
		));
	}

}
