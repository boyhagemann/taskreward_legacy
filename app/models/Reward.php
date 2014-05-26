<?php

/**
 * Class Task
 *
 * @property Token $token
 * @property User $user
 */
class Reward extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rewards';
    
    protected $fillable = array('user_id', 'token_id', 'value', 'currency');

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
}
