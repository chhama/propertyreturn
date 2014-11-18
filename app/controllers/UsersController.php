<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userAll = User::orderBy('name')->paginate();
		$index = $userAll->getPerPage() * ($userAll->getCurrentPage()-1) + 1;
		return View::make('users.index')->with(array(
										'userAll'	=> $userAll,
										'index'		=> $index
										));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
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
		$userAll = User::orderBy('name')->paginate();
		$index = $userAll->getPerPage() * ($userAll->getCurrentPage()-1) + 1;
		$userById = User::find($id);
		return View::make('users.edit')->with(array(
										'userById'	=> $userById,
										'userAll'	=> $userAll,
										'index'		=> $index
										));
		// return View::make('users.edit');	
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
		$password = Input::get('password');
		if(isset($password)){
			$rules = array(
					'currentPassword' => 'required|exists:' . $user->getTable() . ',password',
					'password' => 'required',
					'password_confirm' => 'required|same:password',
				);

			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails()) {
				return Redirect::route('users.changepassword',$id)
					->withErrors($validator)
					->withInput(Input::all());
			}
			else {
				$user->password			= Hash::make(Input::get('password'));
				if($user->save())
					return Redirect::back()->with(['flash_message'=>'Password successfully Updated','msgtype'=>'success']);
			}

		} else {
			$user->emp_id 			= Input::get('emp_id');
			$user->name 			= Input::get('name');
			$user->mobile 			= Input::get('mobile');
			$user->username 		= Input::get('username');
			$user->user_type 		= Input::get('user_type');
			$user->entry_into_service	= Input::get('entry_into_service');
			$user->superannuation_date	= Input::get('superannuation_date');
			if($user->save())
				return Redirect::back()->with(['flash_message'=>'User successfully Updated','msgtype'=>'success']);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return Redirect::route('users.index');
	}

	public function login(){
		$attempt = Auth::attempt([
				'username' => Input::get('username'),
				'password' => Input::get('password')
			]);

		if ($attempt) return Redirect::route('property.create');
		else
			return Redirect::to('/')->with(['flash_message'=>'Invalid Username or Password','msgtype'=>'danger'])->withInput();
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}

	public function changePassword($id){
		$userById = User::find($id);
		return View::make('users.changepassword')->with(array('userById'=>$userById));
	}

	public function profile($id)
	{	
		$userById = User::find($id);
		return View::make('users.profile')->with(array(
										'userById'	=> $userById
										));
		// return View::make('users.edit');	
	}


}
