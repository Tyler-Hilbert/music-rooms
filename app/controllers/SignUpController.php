<?php

class SignUpController extends \BaseController {
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('signup');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = Validator::make($input, ['email' => 'required|unique:users', 'username' => 'required|unique:users', 'password' => 'required']); 
		if ($validator->fails()) 
		{
			return Redirect::back(); 
		}

		$user = new User();
		$user->username = $input['username'];
		$user->email = $input['email'];
		$user->password = Hash::make($input['password']);
		$user->save();

		Auth::login($user);
		return Redirect::intended('/');

		dd('problem');
	}

}
