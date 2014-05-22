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

    /**
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function action()
	{
		return $this->belongsTo('Action');
	}
    
    /**
     * 
     * @return string
     */
    public function getAgoAttribute()
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->diffForHumans();
    }

}
