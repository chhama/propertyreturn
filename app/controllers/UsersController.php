<?php

class UsersController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth',['except'=>['login','forgotpassword','submitforgot']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->user_type == 'admin') {
			$userType = array('employee'=>'employee');
		} elseif(Auth::user()->user_type == 'superadmin') {
			$userType = array('','superadmin'=>'superadmin','admin'=>'admin','employee'=>'employee');
		}
		$departments	= Department::orderby('name')->lists('name','id');
		$userAll = User::orderBy('name')->paginate();
		$index = $userAll->getPerPage() * ($userAll->getCurrentPage()-1) + 1;
		
		if(Auth::user()->user_type == 'employee'){
			return Redirect::to('/')->with(['flash_message'=>'You are not authorized to view the page']);
		}
		else
		return View::make('users.index')->with(array(
										'userAll'	=> $userAll,
										'userType'	=> $userType,
										'index'		=> $index,
										'departments' => $departments
										));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->user_type == 'employee'){
			return Redirect::to('/')->with(['flash_message'=>'You are not authorized to view the page']);
		}
		else
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
		$credentials = array(
				'username' 	=> 'required|unique:'.$user->getTable().',username',
				'emp_id' 	=> 'required|unique:'.$user->getTable().',emp_id',
				'mobile' 	=> 'required|unique:'.$user->getTable().',mobile',
				'password'	=> 'required'
				);
		$validator	= Validator::make(Input::all(),$credentials);
		if($validator->fails()){
			return Redirect::to('users')
								->withErrors($validator)
								->withInput(Input::all())
								->with(['flash_message'=>'Username, Employee ID, Mobile should be unique']);
		} else {
			$user = new User();
			$user->emp_id 			= Input::get('emp_id');
			$user->name 			= Input::get('name');
			$user->mobile 			= Input::get('mobile');
			$user->username 		= Input::get('username');
			$user->password 		= Hash::make(Input::get('password'));
			$user->user_type 		= Input::get('user_type');
			$user->email 			= Input::get('email');
			$user->department_id 	= Input::get('department_id');
			$user->entry_into_service	= Input::get('entry_into_service');
			$user->superannuation_date	= Input::get('superannuation_date');
			$user->remember_token 	= Input::get('_token');
			if($user->save())

			return Redirect::back()->with(['flash_message'=>'User successfully created']);
		}
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
		if(Auth::user()->user_type == 'admin') {
			$userType = array('employee'=>'employee');
		} elseif(Auth::user()->user_type == 'superadmin') {
			$userType = array('','superadmin'=>'superadmin','admin'=>'admin','employee'=>'employee');
		}
		$departments	= Department::orderby('name')->lists('name','id');
		$userAll = User::orderBy('name')->paginate();
		$index = $userAll->getPerPage() * ($userAll->getCurrentPage()-1) + 1;
		$userById = User::find($id);
		if(Auth::user()->user_type == 'employee'){
			return Redirect::to('/')->with(['flash_message'=>'You are not authorized to view the page']);
		}
		else
		return View::make('users.edit')->with(array(
										'userById'	=> $userById,
										'userAll'	=> $userAll,
										'userType'	=> $userType,
										'index'		=> $index,
										'departments' => $departments
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
		$user = new User;

		$rules = array(
			'username' => 'required|unique:' . $user->getTable() . ',username,' . $id,
			'emp_id' => 'required|unique:' . $user->getTable() . ',emp_id,' . $id,
			'mobile' => 'required|unique:' . $user->getTable() . ',mobile,' . $id
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::route('users.edit', $id)
				->withErrors($validator)
				->withInput(Input::all())
				->with(['flash_message'=>'Username, Employee ID, Mobile already exist']);
		} else {
			$user = User::find($id);
			$user->emp_id 			= Input::get('emp_id');
			$user->name 			= Input::get('name');
			$user->mobile 			= Input::get('mobile');
			$user->username 		= Input::get('username');
			if(strlen(Input::get('password')) > 0)
				$user->password 	= Hash::make(Input::get('password'));
			$user->email 			= Input::get('email');
			$user->user_type 		= Input::get('user_type');
			$user->department_id	= Input::get('department_id');
			$user->entry_into_service	= Input::get('entry_into_service');
			$user->superannuation_date	= Input::get('superannuation_date');
			if($user->save())
				return Redirect::back()->with(['flash_message'=>'User successfully Updated']);
			else
				return Redirect::back()->with(['flash_message'=>'Error on Update'])->withInput();
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

		if ($attempt) {
			if(Auth::user()->user_type == 'employee')
				return Redirect::route('property.create');
			else 
				return Redirect::route('dashboard.index');
		}
		else
			return Redirect::to('/')->with(['flash_message'=>'Invalid Username or Password'])->withInput();
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}

	/*public function changePassword($id){
		$userById = User::find($id);
		return View::make('users.changepassword')->with(array('userById'=>$userById));
	}*/

	public function profile($id)
	{	
		if(Auth::user()->id == $id){
			$userById = User::find($id);
			return View::make('users.profile')->with(array(
											'userById'	=> $userById
											));	
		} else {
			return Redirect::to('/')->with(['flash_message'=>'You Are Not Authorized']);
		}
	}

	public function updateProfile($id){

		$user = new User;

		$rules = array(
			'username' => 'required|unique:' . $user->getTable() . ',username,' . $id,
			'emp_id' => 'required|unique:' . $user->getTable() . ',emp_id,' . $id,
			'mobile' => 'required|unique:' . $user->getTable() . ',mobile,' . $id
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::route('users.updateprofile', $id)
				->withErrors($validator)
				->withInput(Input::all())
				->with(['flash_message'=>'Username, Employee ID, Mobile already exist']);
		} else {
			$user = User::find($id);
			$user->emp_id 			= Input::get('emp_id');
			$user->name 			= Input::get('name');
			$user->mobile 			= Input::get('mobile');
			$user->username 		= Input::get('username');
			if(strlen(Input::get('password')) > 0)
				$user->password 	= Hash::make(Input::get('password'));
			$user->email 			= Input::get('email');
			$user->entry_into_service	= Input::get('entry_into_service');
			$user->superannuation_date	= Input::get('superannuation_date');
			if($user->save())
				return Redirect::back()->with(['flash_message'=>'User successfully Updated']);
			else
				return Redirect::back()->with(['flash_message'=>'Error on Update'])->withInput();
		}

	}

	public function forgotpassword(){
		return View::make('users.forgotpassword');
	}

	public function submitforgot(){
		$username = Input::get('username');
		$pass = rand(1000,9999);
		$mobile = Input::get('mobile');

		$userId = User::where('username','=',$username)
						->where('mobile','=',$mobile)
						->pluck('id');
		if($userId) {
			include("../app/config/local/sms.php");
			$post = curl_init();
			curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".$user."&pwd=".$password."&senderid=".$sender."&to=".$mobile."&msg=".urlencode("Your temporary password is $pass. Change it on your next login.")."&route=T");
			//curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".urlencode($user)."&pwd=".urlencode($pass)."&senderid=".urlencode($sender)."&to=".$phone."&msg=".urlencode("One Time Password for submitting Property Returns form is $otp.")."&route=T");
			curl_exec($post);
			curl_close($post);

			$user = User::find($userId);
			$user->password = Hash::make($pass);
			$user->save();



			return Redirect::back()->with(['flash_message'=>'Password Successfully Reset And New Password is Send to Your Mobile'])->withInput();	
		} else {
			return Redirect::back()->with(['flash_message'=>'Username and Mobile No is not Match.'])->withInput();	
		}
	}



}
