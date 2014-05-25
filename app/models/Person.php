<?php

/**
 * Class Moment
 *
 * @property User[] $users
 */
class Person extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'persons';
    
    protected $fillable = array('first_name', 'last_name');

    protected $appends = array('name');
    
    /**
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function users()
	{
		return $this->hasMany('User');
	}
    
    /**
     * 
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


}
