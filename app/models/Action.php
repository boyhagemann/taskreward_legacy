<?php

/**
 * Class Action
 *
 * @property Provider $provider
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
	public function stream()
	{
		return $this->hasMany('Stream');
	}
}
