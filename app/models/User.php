<?php

use Illuminate\Auth\Reminders\RemindableInterface;
use Cartalyst\Sentry\Users\Eloquent\User as SentryUser;

/**
 * User
 *
 * @property User $parent
 * @property User $user
 * @property-read \Person $person
 * @property-read mixed $activated
 * @property mixed $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\static::$groupModel[] $groups
 */
class User extends SentryUser implements RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	protected $visible = array('id', 'created_at', 'activated', 'person');

	public static function boot()
	{
		parent::boot();

		User::creating(function($user) {
			$user->key     = static::generateKey();
		});
	}

	/**
	 *
	 * @return string
	 */
	public static function generateKey()
	{
		$key = Str::random(5);

		if(User::where('key', $key)->first()) {
			return static::generateKey();
		}

		return $key;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
    
    /**
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('User', 'parent_user_id');
    }
    
    /**
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo('Person');
    }

}
