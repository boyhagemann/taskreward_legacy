<?php

class MomentTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Moment::create(array(
			'action_id' => 1,
            'message' => 'New task added',
            'data' => json_encode(array('username' => 'testuser')),
		));
	}

}
