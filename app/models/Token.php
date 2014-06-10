<?php

class Token
{
	/**
	 * @param User $user
	 * @param Task $task
	 * @return string
	 */
	public static function build(User $user, Task $task)
	{
		return $user->key . $task->key;
	}

	/**
	 * @param string $token
	 * @return User
	 */
	public static function getUser($token)
	{
		$key = substr($token, 0, 5);
		return User::where('key', $key)->first();
	}

	/**
	 * @param string $token
	 * @return Task
	 */
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
