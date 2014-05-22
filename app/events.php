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
        'account_id'    => $token->account->id,
        'data'          => json_encode($token->toArray()),
    ));
    
});