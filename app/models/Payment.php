<?php

/**
 * Class Task
 *
 * @property User $user
 * @property Task $task
 * @property Reward[] $rewards
 */
class Payment extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'payments';
    
    protected $fillable = array('user_id', 'value', 'currency');

	protected $visible = array('id', 'created_at', 'value', 'currency', 'rewards', 'user');

	/**
	 * @return Illuminate\Database\Query\Builder
	 */
	public function newBaseQueryBuilder()
	{
		return parent::newBaseQueryBuilder()->orderBy('id', 'DESC');
	}

    /**
	 * @return Reward[]
	 */
	public function rewards()
	{
		return $this->hasMany('Reward');
	}

	/**
	 * @return User
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * @param User $user
	 * @return static
	 */
	public static function getPaymentRequest(User $user)
	{
		$q = Reward::where('user_id', $user->id)->whereNull('payment_id');

		$value = $q->sum('value');

		if($value < 10) {
			return;
		}

		$payment = new static();
		$payment->value 	= $value;
		$payment->user_id 	= $user->id;
		$payment->currency 	= 'EUR';

		return $payment;
	}
}
