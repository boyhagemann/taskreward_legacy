<?php

/**
 * Class Action
 *
 * @property Moment[] $moments
 */
class Action extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'actions';

	/**
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function moments()
	{
		return $this->hasMany('Moment');
	}
}
