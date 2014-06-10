<?php

class TaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = API::get('api/tasks',  Input::all());

		return Input::get('q')
			? View::make('tasks.search', array('tasks' => $tasks, 'q' => Input::get('q')))
			: View::make('tasks.index', compact('tasks'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Task $task
	 * @return Response
	 */
	public function show(Task $task)
	{
        $stream = API::get('api/stream', array(
            'task_id' => $task->id,
        ));

		return View::make('tasks.show', compact('task', 'stream'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Task $task
	 * @return Response
	 */
	public function accept(Task $task)
	{
        $user = Sentry::getUser();
        $token = Token::firstOrCreate(array(
            'task_id' => $task->id,
            'user_id' => $user->id,
        ));
                
        Event::fire('task.accepted', array($token, $user));
        
		return Redirect::route('tasks.show', $task->id);
	}

}
