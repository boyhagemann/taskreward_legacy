<?php

class TokenController extends \BaseController 
{
	/**
	 * Display the specified resource.
	 *
	 * @param  Token $token
	 * @return Response
	 */
	public function redirect($token)
	{
		$task = Token::getTask($token);
		$user = Token::getUser($token);

        Event::fire('token.redirect', array($user, $task, $token));

        $url = $task->uri;

		return Redirect::to($url);
	}

}
