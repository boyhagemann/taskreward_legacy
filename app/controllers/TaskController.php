<?php

class TaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = API::get('api/task', Input::all());

		return View::make('tasks.index', compact('tasks'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Task $task
	 * @return Response
	 */
	public function show(Task $task)
	{
		return View::make('tasks.show', compact('task'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Task $task
	 * @return Response
	 */
	public function accept(Task $task)
	{
        $token = Token::firstOrCreate(array(
            'task_id' => $task->id,
            'user_id' => Auth::user()->id,
        ));
                
		return View::make('tasks.accept', compact('task', 'token'));
	}

}
