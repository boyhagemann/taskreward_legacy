<?php

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Collection;

Event::listen('api.task.index', function(QueryBuilder $qb) {
    
    if(!Input::get('q')) {
        return;
    }


	$client = new Elasticsearch\Client();
	$response = $client->search(array(
		'size' => 1000,
		'index' => 'tasks',
		'type' => 'task',
		'body' => array(
			'query' => array(
				'fuzzy_like_this' => array(
					'fields' => array('title', 'description'),
					'like_text' => Input::get('q'),
				)
			)
		)
	));

	$ids = array_fetch($response['hits']['hits'], '_id');

	$qb->whereIn('id', $ids);

	$order = implode(',', $ids);
	$qb->orderByRaw(DB::raw("FIELD(id, $order)"));

});

Event::listen('api.task.index', function(QueryBuilder $qb) {

	if(!Input::get('with')) {
		return;
	}

	$with = explode(',', Input::get('with'));
	foreach($with as $relation) {
		$qb->with($relation);
	}
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


Event::listen('api.rewards.collection', function(Collection $collection) {

	if(!Input::get('interval') || !Input::get('period')) {
		return;
	}

	$grouped = $collection->groupBy(function($item) {
		return $item['created_at']->toDateString();
	});

	$totals = array();
	foreach($grouped as $date => $items) {

		$collection = new Collection($items);
		$value = $collection->sum(function($item) {
			return $item['value'];
		});

		$totals[$date] = compact('date', 'value');
	}


	switch(Input::get('period')) {

		case 'week':

			foreach(range(0, 7) as $day) {
				$date = Carbon\Carbon::now()->subDays($day)->toDateString();
				$totals = array_merge(array($date => array('date' => $date, 'value' => 0)), $totals);
			}

			ksort($totals);
			$totals = array_values($totals);

			break;

	}

	return new Collection($totals);
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

Event::listen('token.redirect', function(User $user, Task $task, $token) {

	if(strpos($task->uri, '[token]') === false) {
		return App::abort(404);
	}

	$task->uri = str_replace('[token]', $token, $task->uri);

});


Task::saved(function(Task $task) {

	$client = new Elasticsearch\Client();

	$client->index(array(
		'index' => 'tasks',
		'type' => 'task',
		'id' => $task->id,
		'body' => array(
			'title' => $task->title,
			'description' => $task->description,
		)
	));

});