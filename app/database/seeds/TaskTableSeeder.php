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
			'uid' => 'uid1',
			'product_title' => 'Invite people',
			'product_description' => 'Get a nice cut of their sales',
			'product_uri' => URL::route('invitation.create', array('tokens' => '[token]'), false),
			'task' => 'Get people to buy this product',
			'reward' => '9% of their sale',
			'value' => 0,
			'currency' => 'EUR',
		));
        
		Task::create(array(
			'provider_id' => 2,
			'uid' => 'uid1',
			'product_title' => 'Samsung Curved UHD TV SMART 65"',
			'product_description' => 'TV was nog nooit zo meeslepend als met deze gebogen TV. Het bijzondere beeldscherm geeft diepte aan tweedimensionale beelden.',
			'product_uri' => 'http://www.google.com',
			'task' => 'Get people to buy this product',
			'reward' => '100 euro',
			'value' => 100 / 0.91,
			'currency' => 'EUR',
		));
        
		Task::create(array(
			'provider_id' => 3,
			'uid' => 'uid2',
			'product_title' => 'Bose BMT3',
			'product_description' => 'Nice Audio thing',
			'product_uri' => 'http://www.google.com',
			'task' => 'Get people to buy this product',
			'reward' => '60 euro',
			'value' => 60 / 0.91,
			'currency' => 'EUR',
		));
	}

}
