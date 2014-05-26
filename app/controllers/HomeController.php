<?php

class HomeController extends BaseController {

	public function index()
	{
        $tasks = API::get('api/tasks');
        $stream = API::get('api/stream');
		return View::make('layouts.home', compact('tasks', 'stream'));
	}

}
