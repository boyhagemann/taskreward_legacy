<?php

/**
 * 
 * @property Task $task
 * @property User $user
 */
class Token extends Eloquent  {

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_ACCEPTED = 'accepted';
    
  	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tokens';
    
    protected $appends = array('url');
    
    protected $fillable = array('status', 'task_id', 'user_id');
    

    public static function boot()
    {
        parent::boot();
        
        Token::creating(function($token) {            
            $token->key     = static::generateKey();   
            $token->status  = static::STATUS_ACTIVE;
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
	public function user()
	{
		return $this->belongsTo('User');
	}
    
    /**
     * 
     * @return string
     */
    public function getUrlAttribute()
    {
        return URL::route('token.redirect', $this->key);
    }
    
    /**
     * 
     * @return bool
     */
    public function isAccepted()
    {
        return $this->status == static::STATUS_ACCEPTED;
    }

}
