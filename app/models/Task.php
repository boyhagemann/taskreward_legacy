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

	protected $visible = array('id', 'created_at', 'title', 'description', 'uri', 'image', 'type', 'provider');

	protected $fillable = array('uid', 'title', 'description', 'uri', 'image', 'value', 'currency', 'provider_id', 'task_type_id');

	protected $appends = array('reward', 'token', 'tokenUrl', 'imageSmall');

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

	/**
	 * @param $width
	 * @param $height
	 * @return Illuminate\Routing\Route
	 */
	public function thumb($width, $height)
	{
		return URL::route('image.resize', [$this->attributes['image'], $width, $height]);
	}

	public function getImageAttribute()
	{
		return $this->thumb(120, 120);
	}

	public function getImageSmallAttribute()
	{
		return $this->thumb(80, 80);
	}
}
