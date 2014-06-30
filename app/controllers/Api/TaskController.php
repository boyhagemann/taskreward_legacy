<?php namespace Api;

use Task, Event, Input, Exception;

class TaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function index()
	{
		$q = Task::query();
        
        Event::fire('api.index', $q);
        Event::fire('api.task.index', $q);

		return $q->paginate(Input::get('limit') ?: 10)->appends(Input::except('page'));
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
		if(Input::get('tasks')) {
			return $this->batch();
		}

		try {

			$task = Task::where('uid', Input::get('uid'))->first();

			if($task) {
				return $this->update($task);
			}

			$task = new Task;
			$task->fill(Input::all());
			$task->save();

			return array(
				'success' => true,
				'messages' => array('Task created'),
			);

		}
		catch(Exception $e) {

			return array(
				'success' => false,
				'messages' => array($e->getMessage()),
			);

		}
	}

	/**
	 * @return Response|array
	 */
	protected function batch()
	{
		$response = array();
		foreach(Input::get('tasks') as $task) {
			Input::replace($task);
			$response[] = $this->store();
		}

        Event::fire('api.task.batch', array($response));

		return $response;
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
	 * @param  Task $task
	 * @return Response
	 */
	public function update(Task $task)
	{
		if(Input::get('tasks')) {
			return $this->batch();
		}

		try {

			$task->fill(Input::all());
			$task->save();

			return array(
				'success' => true,
				'messages' => array('Task updated'),
			);

		}
		catch(Exception $e) {

			return array(
				'success' => false,
				'messages' => array($e->getMessage()),
			);

		}
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
