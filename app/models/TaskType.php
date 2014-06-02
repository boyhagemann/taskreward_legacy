<?php

/**
 * Class TaskType
 *
 * @property Task[] $tasks
 */
class TaskType extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'task_types';

	protected $visible = array('id', 'title', 'description');

	/**
	 * @return mixed
	 */
	public function tasks()
	{
		return $this->hasMany('Task');
	}
}
