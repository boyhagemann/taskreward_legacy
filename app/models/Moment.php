<?php

/**
 * Class Moment
 *
 * @property Action $action
 */
class Moment extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'moments';
    
    protected $with = 'action';

    protected $fillable = array('action_id', 'user_id', 'task_id', 'token_id', 'params');

	protected $visible = array('id', 'created_at');

    protected $appends = array('text', 'ago');

    /**
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function action()
	{
		return $this->belongsTo('Action');
	}
    
    /**
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}
    
    /**
     * 
     * @return string
     */
    public function getAgoAttribute()
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->diffForHumans();
    }

	/**
	 * @param array $params
	 */
	public function setParamsAttribute(Array $params)
	{
		$this->attributes['params'] = json_encode($params);
	}

	/**
	 * @param $value
	 * @return array
	 */
	public function getParamsAttribute($value)
	{
		return (array) json_decode($value, true);
	}

	/**
	 * @return string
	 */
	public function getTextAttribute()
	{
		$params = $this->params;
		$message = $this->action->message;

		return isset($params['count'])
			? Lang::choice($message, $params['count'], $params)
			: Lang::get($message, $params);
	}

    /**
     * 
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function newBaseQueryBuilder()
    {
        return parent::newBaseQueryBuilder()->orderBy('created_at', 'DESC');
    }

}
