<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('ProviderTableSeeder');
		 $this->call('TaskTableSeeder');
		 $this->call('ActionTableSeeder');
		 $this->call('MomentTableSeeder');
		 $this->call('AccountTableSeeder');
		 $this->call('TokenTableSeeder');
	}

}
