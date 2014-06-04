<?php

/**
 * Class Task
 *
 * @property Provider $provider
 */
class Task extends Eloquent {

	const ACTION_SELL 		= 'sell';
	const ACTION_RECRUIT 	= 'recruit';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	protected $visible = array('id', 'created_at', 'title', 'description', 'uri', 'image', 'action', 'provider');

	protected $fillable = array('uid', 'title', 'action', 'description', 'uri', 'image', 'value', 'currency', 'provider_id');

	protected $appends = array('task', 'reward', 'token', 'tokenUrl', 'imageSmall');

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
	 * @return string
	 */
	public function getTaskAttribute()
	{
		return Lang::get('tasks.actions.' . $this->action);
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
		return URL::route('image.thumb', [$this->attributes['image'], $width, $height]);
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
