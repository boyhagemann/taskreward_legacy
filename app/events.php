<?php

use Illuminate\Database\Eloquent\Builder as QueryBuilder;

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
            
    Moment::create(array(
        'message'       => sprintf('%s sold: %s earns %s %s', $task->product_title, $person->name, $sale->value, $sale->currency),
        'action_id'     => 3,
        'user_id'       => $sale->user->id,
        'data'          => json_encode($sale->toArray()),
    ));
    
});