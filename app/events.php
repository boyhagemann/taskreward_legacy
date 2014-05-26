<?php

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Collection;

Event::listen('api.task.index', function(QueryBuilder $qb) {
    
    if(!Input::get('q')) {
        return;
    } 
    
    $parts = explode(' ', Input::get('q'));
    
    foreach($parts as $q) {
        
        $qb->where(function($qb) use($q) {
            $qb->orWhere('product_title', 'LIKE', '%' . $q .'%');
            $qb->orWhere('product_description', 'LIKE', '%' . $q .'%');
        });        
    }
});

Event::listen('api.task.index', function(QueryBuilder $qb) {
    
    if(!Input::get('user_id')) {     
        return;
    } 
    
    $qb->whereHas('tokens', function($qb) {
        $qb->where('user_id', Input::get('user_id'));
    });    
});

Event::listen('api.stream.index', function(QueryBuilder $qb) {
    
    if(!Input::get('user_id')) {
        $qb->whereHas('action', function($qb) {
            $qb->where('visibility', 'public');
        });        
        return;
    } 
    
    $qb->where(function($qb) {
        $qb->orWhere('user_id', Input::get('user_id'));    
        $qb->orWhereNull('user_id');    
    });
});

Event::listen('api.stream.index', function(QueryBuilder $qb) {
    
    if(!Input::get('task_id')) {       
        return;
    } 
    
    $qb->where('task_id', Input::get('task_id'));
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

Event::listen('api.token.update', function(Token $token) {
    
    if(!$token->isAccepted()) {
        return;
    }
    
    SaleRepository::createFromToken($token);
    
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


Event::listen('user.invite', function(User $user, $password) {
            
    Mail::send('emails.user.invitation', compact('user', 'password'), function($message) use ($user) {
        $message->to($user->email);
        $message->from($user->parent->email);
        $message->subject(sprintf('%s has invited you', $user->name));
    });
    
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

Event::listen('task.accepted', function(Token $token, User $user) {

    Moment::create(array(
        'action_id' => 4,
        'user_id'   => $user->id,
        'task_id'   => $token->task_id,
        'token_id'  => $token->id,
		'params' 	=> array('task' => $token->task->product_title)
    ));
    
});

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