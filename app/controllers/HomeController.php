<?php

class HomeController extends BaseController {

	public function comeonin()
	{
		if (Auth::user())
	    {
	      return Redirect::route('home');
	    }

	    return View::make('frontend.home.comeonin');
	}

	public function index()
	{
		return View::make('frontend.home.index');
	}

}
