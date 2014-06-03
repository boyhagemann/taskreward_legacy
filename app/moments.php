<?php

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Collection;

Task::created(function(Task $task) {

	Moment::create(array(
		'action_id' => 1,
		'task_id' => $task->id,
		'params' => array(
			'url' => URL::route('tasks.show', $task->id),
			'title' => $task->product_title
		)
	));

});

Event::listen('token.redirect', function(User $user, Task $task, $token) {

    Moment::create(array(
        'action_id' => 2,
        'user_id'   => $user->id,
        'task_id'   => $task->id,
        'params' 	=> array('key' => $token, 'url' => $task->tokenUrl),
    ));
    
});

Reward::created(function(Reward $reward) {

    $task   = $reward->task;
    $person = $reward->user->person;

    Moment::create(array(
        'action_id' => 3,
        'user_id'   => $reward->user_id,
        'task_id'   => $reward->task_id,
        'reward_id' => $reward->id,
		'params' 	=> array(
			'product'   => $task->product_title,
			'name'      => $person->name,
			'value'     => $reward->value,
			'currency'  => $reward->currency
		)
    ));
    
});

Event::listen('invitation.stored', function(Collection $result, User $user) {
       
    $count = $result->sum(function($item) {
        return $item['success'];
    });

    Moment::create(array(
        'action_id' => 5,
        'user_id'   => $user->id,
		'params' 	=> array(
			'count' => $count,
			'name' => $user->person->name
		),
    ));
    
});