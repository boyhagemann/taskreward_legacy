<?php

/**
 * Class Task
 *
 * @property User $user
 * @property Task $task
 * @property Moment[] $moment
 */
class Reward extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rewards';
    
    protected $fillable = array('uid', 'user_id', 'task_id', 'value', 'currency');

	protected $visible = array('id', 'created_at', 'value', 'currency', 'task', 'user', 'stream');

	/**
	 * @return Illuminate\Database\Query\Builder
	 */
	public function newBaseQueryBuilder()
	{
		return parent::newBaseQueryBuilder()->orderBy('id', 'DESC');
	}

    /**
	 * @return Token
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * @return Task
	 */
	public function task()
	{
		return $this->belongsTo('Task');
	}


	/**
	 * @return Moment[]
	 */
	public function stream()
	{
		return $this->hasMany('Moment', 'task_id', 'task_id');
	}

	/**
	 * @param Payment $payment
	 */
	public static function bindToPayment(Payment $payment)
	{
		DB::table('rewards')
			->where('user_id', $payment->user_id)
			->whereNull('payment_id')
			->update([
			'payment_id' => $payment->id,
		]);
	}
}
