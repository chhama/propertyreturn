<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	
	public function home()
	{
				$departments	= Department::orderby('name')->lists('name','id');
				$userAll = User::orderBy('name')->paginate();
				$index = $userAll->getPerPage() * ($userAll->getCurrentPage()-1) + 1;
				return View::make('frontend.index')->with(array(
										'userAll'	=> $userAll,
										'index'		=> $index,
										'departments' => $departments
										));

		// return View::make('frontend.index');
	}

}
