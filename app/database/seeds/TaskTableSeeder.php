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
			'action' => Task::ACTION_RECRUIT,
			'uid' => 'uid1',
			'title' => 'Invite people',
			'teaser' => 'Get a nice cut of their sales',
			'description' => 'Get a nice cut of their sales',
			'uri' => URL::route('invitation.create', array('tokens' => '[token]'), false),
			'value' => 0,
			'currency' => 'EUR',
		));
        
		Task::create(array(
			'provider_id' => 2,
			'action' => Task::ACTION_SELL,
			'uid' => 'uid2',
			'title' => 'Samsung Curved UHD TV SMART 65"',
			'teaser' => 'TV was nog nooit zo meeslepend als met deze gebogen TV. Het bijzondere beeldscherm geeft diepte aan tweedimensionale beelden.',
			'description' => 'TV was nog nooit zo meeslepend als met deze gebogen TV. Het bijzondere beeldscherm geeft diepte aan tweedimensionale beelden.',
			'uri' => 'http://www.google.com',
			'value' => 100 / 0.91,
			'currency' => 'EUR',
		));
	}

}
