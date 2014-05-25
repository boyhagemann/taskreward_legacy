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
    
    protected $appends = array('ago');
    
    protected $fillable = array('message', 'action_id', 'user_id', 'task_id', 'token_id');

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
     * 
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function newBaseQueryBuilder()
    {
        return parent::newBaseQueryBuilder()->orderBy('created_at', 'DESC');
    }

}
