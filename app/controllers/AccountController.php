<?php

class AccountController extends BaseController {

	### Sign In
	/* After submitting the sign-in form */
	public function postSignIn() {
		$validator = Validator::make(Input::all(),
			array(
				'login' 	=> 'required',
				'password'	=> 'required'
			)
		);
		if($validator->fails()) {
			// Redirect to the sign in page
			return Redirect::route('account-sign-in')
				->withErrors($validator)
				->withInput();   // redirect the input
		} else {
			$remember = (Input::has('remember')) ? true : false;
			$auth = Auth::attempt(array(
				'login' => Input::get('login'),
				'password' => Input::get('password')
			), $remember);
		} 

		if($auth) {
			// Upon Successful Authentication - Create an API Key for the user for log in via Mobile 
			$user_id = Auth::id();
			$user_api_key = "apikey-".str_random(20);

			$user_api_data = UserApi::find(Auth::id());
			if ($user_api_data) {
                            $user_api_data->user_api_key = $user_api_key;
                            $user_api_data->save();
			} else {		
                            $user_api_data = UserApi::create(array(
                                'user_id' 	=> $user_id,
                                'user_api_key' 	=> $user_api_key
                            ));
			}
			return Redirect::intended('/');
		} else {
			return Redirect::route('account-sign-in')
			->with('global', 'Wrong Email or Wrong Password.');
		}

		return Redirect::route('account-sign-in')
			->with('global', 'There is a problem. Have you activated your account?');
	}

	public function getSignIn() {
		return View::make('account.signin');
	}

	### Create Account 
	/* Submitting the Create User form (POST) */
	public function postCreate() {
		$validator = Validator::make(Input::all(),
			array(
				'login'		=> 'required|max:20|min:3|unique:cms_users',
				'password'	=> 'required',
				'password_again'=> 'required|same:password'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-create')
				->withErrors($validator)
				->withInput();   // fills the field with the old inputs what were correct

		} else {
			// create an account
			$login    = Input::get('login');
			$password = Input::get('password');

			// Activation code
			$code	= str_random(60);

			// record				
			$userdata = User::create(array(
				
				'login' 	=> $login,
				'password' 	=> Hash::make($password),	// Changed the default column for Password
				'code'		=> $code,
				'active'	=> 0
			));

			if($userdata) {			


				return Redirect::route('account-sign-in')
					->with('global', 'Your account has been created. We have sent you an email to activate your accout');				
			}
		}
	}

	/* Viewing the form (GET) */
	public function getCreate() {
		return View::make('account.create');
	}

	### Sign Out
	public function getSignOut() {

		$user_api_data = UserApi::find(Auth::id());
                if ($user_api_data) {

                        $user_api_data->user_api_key = NULL;
                        $user_api_data->save();

                }

		Auth::logout();
		// Code to logout of FB
		//session_start();
		// Maybe even destroy all native sessions as overkill
		//unset($session);
		//session_destroy();

		return Redirect::route('home');
	}


}  