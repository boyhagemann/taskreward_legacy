<?php

class StreamTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Stream::create(array(
			'action_id' => 1,
            'message' => 'New task added',
            'data' => json_encode(array('username' => 'testuser')),
		));
	}

}
