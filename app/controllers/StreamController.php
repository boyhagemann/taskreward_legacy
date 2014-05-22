<?php

class StreamController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stream = API::get('api/stream');

		return View::make('stream.index', compact('stream'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Moment $moment
	 * @return Response
	 */
	public function show(Moment $moment)
	{
		return View::make('stream.show', compact('moment'));
	}

}
