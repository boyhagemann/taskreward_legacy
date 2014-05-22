<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * Class Provider
 *
 * @property Task[] $tasks
 */
class Provider extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'providers';

	/**
	 * @return mixed
	 */
	public function tasks()
	{
		return $this->hasMany('Task');
	}
}
