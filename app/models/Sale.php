<?php

/**
 * Class Task
 *
 * @property Token $token
 * @property Account $account
 */
class Sale extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sales';
    
    protected $fillable = array('account_id', 'token_id', 'value', 'currency');

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
	public function account()
	{
		return $this->belongsTo('Account');
	}
}
