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
		$user_id = Auth::id();
		$query = UserApi::select('user_api_key')
                    ->where('user_id', '=', $user_id)
                    ->orderBy('created_at', 'desc')->first();
        if ($query) {
        	$user_api_key = $query->user_api_key;
        	View::share('user_api_key', $user_api_key );
        }

		return View::make('hello');
	}
        
        public function usageTest()
        {
            return View::make('usage');
        }

}
