<?php

class ActionTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Action::create(array(
			'name' => 'task_added',
            'title' => 'New task added',
            'visibility' => 'public',
		));
        
		Action::create(array(
			'name' => 'link_clicked',
            'title' => 'Link clicked',
            'visibility' => 'public',
		));
	}

}
