<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Token extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tokens';

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

}
