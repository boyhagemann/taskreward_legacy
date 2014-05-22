<?php

/**
 * Class Stream
 *
 * @property Action $action
 */
class Stream extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stream';
    
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
