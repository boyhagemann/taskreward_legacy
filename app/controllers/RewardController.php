<?php

class RewardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rewards = API::get('api/rewards', array(
			'user_id' => Sentry::getUser()->id,
		));

		return View::make('rewards.index', compact('rewards'));
	}

}
