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

Event::listen('api.rewards.index', function(QueryBuilder $qb) {

	if(!Input::get('user_id')) {
		return;
	}

	$qb->where('user_id', Input::get('user_id'));
});

Event::listen('api.rewards.index', function(QueryBuilder $qb) {

	if(!Input::get('with')) {
		return;
	}

	$with = explode(',', Input::get('with'));
	foreach($with as $relation) {

		$qb->with($relation);
	}
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


Event::listen('api.token.update', function(Token $token) {
    
    if(!$token->isAccepted()) {
        return;
    }
    
    RewardRepository::createFromToken($token);
    
});

Event::listen('user.invite', function(User $user, $password) {
            
    Mail::send('emails.user.invitation', compact('user', 'password'), function($message) use ($user) {
        $message->to($user->email);
        $message->from($user->parent->email);
        $message->subject(sprintf('%s has invited you', $user->name));
    });

});

User::created(function(User $user) {

	Token::firstOrCreate(array(
		'task_id' => 1, // Invite people
		'user_id' => $user->id,
	));

});

Event::listen('token.redirect', function(Token $token) {
    
//    $token->task->setVisible(array('product_uri'));
    $token->task->product_uri = str_replace('%5Btoken%5D', $token->key, $token->task->product_uri); 
});