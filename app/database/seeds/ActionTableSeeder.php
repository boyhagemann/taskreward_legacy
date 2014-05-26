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
			'id' 			=> 1,
			'name' 			=> 'task_added',
			'message' 		=> 'moments.task_added',
            'title' 		=> 'New task added',
            'visibility' 	=> 'public',
		));
        
		Action::create(array(
			'id' 			=> 2,
			'name' 			=> 'link_clicked',
			'message'   	=> 'moments.message.clicked',
            'visibility' 	=> 'private',
		));
        
		Action::create(array(
			'id' 			=> 3,
			'name' 			=> 'sale_added',
			'message'   	=> 'moments.sale',
            'title' 		=> 'New sale added',
            'visibility' 	=> 'public',
		));
        
		Action::create(array(
			'id' 			=> 4,
			'name' 			=> 'task_accepted',
			'message'   	=> 'moments.message.task_accepted',
            'title' 		=> 'Task accepted',
            'visibility' 	=> 'public',
		));

		Action::create(array(
			'id' 			=> 5,
			'name' 			=> 'user_invited',
			'message'   	=> 'moments.invitation',
            'title' 		=> 'Task accepted',
            'visibility' 	=> 'public',
		));
	}

}
