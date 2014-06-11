<?php namespace Api;

use Payment, Event, Input;

class PaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function index()
	{
		$q = Payment::query();
        
        Event::fire('api.index', $q);
        Event::fire('api.payments.index', $q);

		return $q->paginate(Input::get('limit') ?: 10)->appends(Input::except('page'));
	}


}
