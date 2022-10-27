<?php

use Illuminate\Http\Request;

class AccountController extends BaseController {

	### Sign In
	/* After submitting the sign-in form */
	public function postSignIn(Request $request) {

		$this->validate($request, [
			'username' 	=> 'required',
			'password'	=> 'required'
		]);

		if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return Redirect::intended('/');
        }

		return Redirect::route('account-sign-in')
			->with('global', 'There is a problem. Have you activated your account?');
	}

	/* Submitting the Create User form (POST) */
	public function postCreate(Request $request) {
		$inputs = $request->all();
		$this->validate($request, [
			'username'		=> 'required|max:20|min:3|unique:users',
			'password'		=> 'required',
			'password_again'=> 'required|same:password'
		]);

		$validator = Validator::make(Input::all(),
			array(
				'username'		=> 'required|max:20|min:3|unique:users',
				'password'		=> 'required',
				'password_again'=> 'required|same:password'
			)
		);

		$userdata = User::create(array(
			'username' 	=> $input['username'],
			'password' 	=> Hash::make($input['password'])	// Changed the default column for Password
		));

		if($userdata) {			
			return Redirect::route('account-sign-in')
				->with('global', 'Your account has been created. We have sent you an email to activate your account');				
		}
	}

	public function getSignIn() {
		return View::make('account.signin');
	}

	/* Viewing the form (GET) */
	public function getCreate() {
		return View::make('account.create');
	}

	### Sign Out
	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home');
	}


}  