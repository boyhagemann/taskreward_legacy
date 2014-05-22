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
	 * @param  Stream $stream
	 * @return Response
	 */
	public function show(Stream $stream)
	{
		return View::make('stream.show', compact('stream'));
	}

}
