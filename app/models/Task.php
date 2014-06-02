<?php

/**
 * Class Task
 *
 * @property Provider $provider
 * @property TaskType $type
 * @property Token[] $tokens
 */
class Task extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	protected $visible = array('id', 'created_at', 'title', 'description', 'uri', 'type', 'provider');

	protected $appends = array('reward');

	/**
	 * @return mixed
	 */
	public function provider()
	{
		return $this->belongsTo('Provider');
	}

	/**
	 * @return mixed
	 */
	public function type()
	{
		return $this->belongsTo('TaskType', 'task_type_id');
	}
    
	/**
	 * @return mixed
	 */
	public function tokens()
	{
		return $this->hasMany('Token');
	}

	/**
	 * @return string
	 */
	public function getRewardAttribute()
	{
		return $this->value . ' ' . $this->currency;
	}
}
