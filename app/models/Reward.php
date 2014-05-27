<?php

/**
 * Class Task
 *
 * @property Token $token
 * @property User $user
 * @property Task $task
 * @property Moment[] $moment
 */
class Reward extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rewards';
    
    protected $fillable = array('user_id', 'task_id', 'token_id', 'value', 'currency');

	protected $visible = array('id', 'created_at', 'value', 'currency', 'task', 'user', 'stream');

    /**
	 * @return Token
	 */
	public function token()
	{
		return $this->belongsTo('Token');
	}
    
    /**
	 * @return Token
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * @return Task
	 */
	public function task()
	{
		return $this->belongsTo('Task');
	}


	/**
	 * @return Moment[]
	 */
	public function stream()
	{
		return $this->hasMany('Moment', 'token_id', 'token_id');
	}
}
