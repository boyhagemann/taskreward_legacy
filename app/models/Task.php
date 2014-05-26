<?php

/**
 * Class Task
 *
 * @property Provider $provider
 * @property Token[] $tokens
 */
class Task extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	protected $visible = array('id', 'created_at', 'task', 'reward', 'product_title', 'product_description');

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
	public function tokens()
	{
		return $this->hasMany('Token');
	}
}
