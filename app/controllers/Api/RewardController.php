<?php namespace Api;

use Reward, Event, Input, Token;

class RewardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function index()
	{
		$q = Reward::query();
        
        Event::fire('api.index', $q);
        Event::fire('api.rewards.index', $q);

		$collection = $q->get();

		$result = Event::until('api.rewards.collection', $collection);

		return $result ? $result : $collection;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Token $token
	 * @return Response
	 */
	public function store()
	{
		if(Input::get('batch')) {
			return $this->batch();
		}

		$token = Input::get('token');

		$user = Token::getUser($token);
		$task = Token::getTask($token);

		if(Reward::where('uid', Input::get('uid'))->first()) {
			return array(
				'success' => false,
				'messages' => array('Reward already stored')
			);
		}

		$reward = new Reward;
		$reward->fill(Input::all());
		$reward->user_id = $user->id;
		$reward->task_id = $task->id;
		$reward->save();

		return array(
			'success' => true,
			'messages' => array('New reward stored')
		);
	}

	public function batch()
	{
		$result = array();

		foreach(Input::get('batch') as $data) {
			Input::replace($data);
			$result[] = $this->store();
		}

		return $result;
	}

}
