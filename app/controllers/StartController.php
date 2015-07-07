<?php

class StartController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            return View::make('intro');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{   
            
            $input = Input::only(            
                'email'            
            );
            
            $rules = ['email' => 'required|email'];
            $validator = Validator::make($input, $rules);
            if($validator->fails())
            {
                return 'Uh ohh.. The email is not valid';
            }
        
            $rules = ['email' => 'unique:user_signups'];
            $validator = Validator::make($input, $rules);
            if($validator->fails())
            {
                return 'Email already registered!';
            }
        
            DB::table('user_signups')->insert(array('email' => Input::get('email')));
            
            return "You will hear from us shortly!";

	}

}
