<?php

class HomeController extends BaseController {

	public function index()
	{
        $taskCount = floor(Task::count() / 100) * 100;
		return View::make('layouts.home', compact('taskCount'));
	}

}
