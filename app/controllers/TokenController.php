<?php

class TokenController extends \BaseController 
{
	/**
	 * Display the specified resource.
	 *
	 * @param  Token $token
	 * @return Response
	 */
	public function redirect(Token $token)
	{
        Event::fire('token.redirect', array($token));
        
        $url = $token->task->product_uri;
		return Redirect::to($url);
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
