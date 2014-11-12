<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User();
		$user->emp_id 			= Input::get('emp_id');
		$user->name 			= Input::get('name');
		$user->mobile 			= Input::get('mobile');
		$user->username 		= Input::get('username');
		$user->password 		= Hash::make(Input::get('password'));
		$user->user_type 		= Input::get('user_type');
		$user->entry_into_service	= Input::get('entry_into_service');
		$user->superannuation_date	= Input::get('superannuation_date');
		$user->remember_token 	= Input::get('_token');
		if($user->save())
			return Redirect::back()->with(['flash_message'=>'User successfully created','msgtype'=>'success']);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$userById = User::find($id);
		//return View::make('users.edit')->with(array('userById'=>$userById));
		return View::make('users.edit');	
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$user->emp_id 			= Input::get('emp_id');
		$user->name 			= Input::get('name');
		$user->mobile 			= Input::get('mobile');
		$user->username 		= Input::get('username');
		$user->password 		= Hash::make(Input::get('password'));
		$user->user_type 		= Input::get('user_type');
		$user->entry_into_service	= Input::get('entry_into_service');
		$user->superannuation_date	= Input::get('superannuation_date');
		$user->remember_token 	= Input::get('_token');
		if($user->save())
			return Redirect::back()->with(['flash_message'=>'User successfully created','msgtype'=>'success']);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function login(){
		$attempt = Auth::attempt([
				'username' => Input::get('username'),
				'password' => Input::get('password')
			]);

		if ($attempt) return Redirect::to('returns.create');
		else
			return Redirect::to('/')->with(['flash_message'=>'Invalid Username or Password','msgtype'=>'danger'])->withInput();
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}


}
