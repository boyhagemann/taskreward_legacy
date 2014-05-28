<?php namespace Api;

use Reward, Event;

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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
