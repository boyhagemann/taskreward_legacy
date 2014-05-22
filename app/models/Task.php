<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * Class Task
 *
 * @property Provider $provider
 */
class Task extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	/**
	 * @return mixed
	 */
	public function provider()
	{
		return $this->belongsTo('Provider');
	}
}
