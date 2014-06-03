<?php

class Token
{
	public static function build(User $user, Task $task)
	{
		return $user->key . $task->key;
	}

	/**
	 * @param $token
	 * @return mixed
	 */
	public static function getUser($token)
	{
		$key = substr($token, 0, 5);
		return User::where('key', $key)->first();
	}

	public static function getTask($token)
	{
		$key = substr($token, 5, 10);
		return Task::where('key', $key)->first();
	}

	/**
	 * @param $token
	 * @return Response
	 */
	public static function url($token)
	{
		return URL::route('token.redirect', $token);
	}
}
