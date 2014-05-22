<?php

/**
 * 
 * @property Task $task
 * @property Account $account
 */
class Token extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tokens';
    
    protected $appends = array('url');

    public static function boot()
    {
        parent::boot();
        
        Token::creating(function($token) {            
            $token->key = static::generateKey();            
        });
    }

    /**
     * 
     * @return string
     */
    public static function generateKey()
    {
        $key = Str::random(10);
        
        if(Token::where('key', $key)->first()) {
            return static::generateKey();
        }
        
        return $key;
    }
    
	/**
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function task()
	{
		return $this->belongsTo('Task');
	}
    
	/**
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function account()
	{
		return $this->belongsTo('Account');
	}
    
    /**
     * 
     * @return string
     */
    public function getUrlAttribute()
    {
        return URL::route('token.redirect', $this->key);
    }

}
