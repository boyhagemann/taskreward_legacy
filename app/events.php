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
    
    $message = Lang::get('moments.clicked', $token->toArray());
    
    Moment::create(array(
        'message'       => $message,
        'action_id'     => 2,
        'user_id'       => $token->user_id,
        'task_id'       => $token->task_id,
        'token_id'      => $token->id,
        'data'          => json_encode($token->toArray()),
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
    
    $message = Lang::get('moments.sale', array(
        'product'   => $task->product_title, 
        'name'      => $person->name, 
        'value'     => $sale->value, 
        'currency'  => $sale->currency
    ));    
            
    Moment::create(array(
        'message'   => $message,
        'action_id' => 3,
        'user_id'   => $sale->user->id,
        'task_id'   => $token->task_id,
        'token_id'  => $token->id,
        'sale_id'   => $sale->id,
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
    
    $message = Lang::choice('moments.invitation', $count, array('name' => $user->person->name));
    
    Moment::create(array(
        'message'       => $message,
        'action_id'     => 3,
        'user_id'       => $user->id,
    ));
    
});

Event::listen('task.accepted', function(Token $token, User $user) {
    
    $message = Lang::get('moments.task_accepted', array('task' => $token->task->product_title));
    
    Moment::create(array(
        'message'       => $message,
        'action_id'     => 4,
        'user_id'       => $user->id,
        'task_id'       => $token->task_id,
        'token_id'      => $token->id,
    ));
    
});

Task::created(function(Task $task) {
    
    $message = Lang::get('moments.task_added', array('url' => URL::route('tasks.show', $task->id), 'title' => $task->product_title));

    Moment::create(array(
        'action_id' => 1,
        'message' => $message,
        'task_id' => $task->id,
    ));
    
});