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


Event::listen('token.redirect', function(Token $token) {
    
    Moment::create(array(
        'message'       => sprintf('Your link is clicked (<a href="%s">%s</a>)...', $token->url, $token->key),
        'action_id'     => 2,
        'user_id'    => $token->user->id,
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
    
    $task = $sale->token->task;
    $person = $sale->user->person;
    
    $message = Lang::choice('moments.sale', 0, array(
        'product'   => $task->product_title, 
        'name'      => $person->name, 
        'value'     => $sale->value, 
        'currency'  => $sale->currency
    ));    
            
    Moment::create(array(
        'message'   => $message,
        'action_id' => 3,
        'user_id'   => $sale->user->id,
        'data'      => json_encode($sale->toArray()),
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
        'data'          => json_encode(compact('count', 'user')),
    ));
    
});