<?php

class ProviderTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Provider::create(array(
			'name' => 'Products provider',
			'description' => 'providing affiliate product links',
		));
	}

}
