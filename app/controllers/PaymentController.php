<?php

class PaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$payments = API::get('api/payments', array(
			'user_id' => Sentry::getUser()->id,
		));

		return View::make('payments.index', compact('payments'));
	}

	/**
	 * @param Payment $payment
	 * @return mixed
	 */
	public function show(Payment $payment)
	{
		$payment->load('rewards');

		return View::make('payments.show', compact('payment'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function request()
	{
		$payment = Payment::getPaymentRequest();

		if(!$payment) {
			return Redirect::route('user.dashboard')->withError(Lang::get('payments.request.invalid'));
		}

		$payment->save();

		Reward::bindToPayment($payment);

		return Redirect::route('payments.show', $payment->id)->withSuccess(Lang::get('payments.request.created'));
	}

}
