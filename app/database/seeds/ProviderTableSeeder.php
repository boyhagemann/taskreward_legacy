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
            'id'            => 1,
			'name'          => 'TaskReward',
			'description'   => 'Workers network',
		));
        
		Provider::create(array(
            'id'            => 2,
			'name'          => 'Products provider',
			'description'   => 'Providing affiliate product links',
		));
	}

}
