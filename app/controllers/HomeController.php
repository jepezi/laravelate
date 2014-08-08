<?php

class HomeController extends BaseController {

	public function comeonin()
	{
	    return View::make('frontend.home.comeonin');
	}

	public function index()
	{
		return View::make('frontend.home.index');
	}

}
