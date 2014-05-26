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

Event::listen('token.redirect', function(Token $token) {

    Moment::create(array(
        'action_id' => 2,
        'user_id'   => $token->user_id,
        'task_id'   => $token->task_id,
        'token_id'  => $token->id,
        'params' 	=> $token->toArray(),
    ));
    
});

Sale::created(function(Sale $sale) {
    
    $token  = $sale->token;
    $task   = $token->task;
    $person = $sale->user->person;

    Moment::create(array(
        'action_id' => 3,
        'user_id'   => $sale->user->id,
        'task_id'   => $token->task_id,
        'token_id'  => $token->id,
        'sale_id'   => $sale->id,
		'params' 	=> array(
			'product'   => $task->product_title,
			'name'      => $person->name,
			'value'     => $sale->value,
			'currency'  => $sale->currency
		)
    ));
    
});

Event::listen('task.accepted', function(Token $token, User $user) {

	Moment::create(array(
		'action_id' => 4,
		'user_id'   => $user->id,
		'task_id'   => $token->task_id,
		'token_id'  => $token->id,
		'params' 	=> array('task' => $token->task->product_title)
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