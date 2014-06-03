<?php

/**
 * Class Task
 *
 * @property Provider $provider
 * @property TaskType $type
 */
class Task extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	protected $visible = array('id', 'created_at', 'title', 'description', 'uri', 'type', 'provider');

	protected $fillable = array('uid', 'title', 'description', 'uri', 'value', 'currency', 'provider_id', 'task_type_id');

	protected $appends = array('reward', 'token', 'tokenUrl');

	public static function boot()
	{
		parent::boot();

		Task::creating(function($task) {
			$task->key     = static::generateKey();
		});
	}

	/**
	 *
	 * @return string
	 */
	public static function generateKey()
	{
		$key = Str::random(5);

		if(Task::where('key', $key)->first()) {
			return static::generateKey();
		}

		return $key;
	}

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
	 * @return string
	 */
	public function getRewardAttribute()
	{
		return $this->value . ' ' . $this->currency;
	}


	/**
	 * @return string|null
	 */
	public function getTokenAttribute()
	{
		if(!Sentry::check()) {
			return;
		}

		return Token::build(Sentry::getUser(), $this);
	}

	/**
	 * @return string
	 */
	public function getTokenUrlAttribute()
	{
		if(!$this->token) {
			return;
		}

		return Token::url($this->token);
	}
}
