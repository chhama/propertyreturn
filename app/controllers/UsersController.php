<?php

class UsersController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth',['except'=>'login']);
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
			return Redirect::to('/')->with(['flash_message'=>'<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>You are not authorized to view the page</div>']);
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
			return Redirect::to('/')->with(['flash_message'=>'<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>You are not authorized to view the page</div>']);
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
			return Redirect::back()->with(['flash_message'=>'<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>User successfully created</div>']);

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
			return Redirect::to('/')->with(['flash_message'=>'<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>You are not authorized to view the page</div>']);
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
			$user->email 			= Input::get('email');
			$user->department_id	= Input::get('department_id');
			$user->entry_into_service	= Input::get('entry_into_service');
			$user->superannuation_date	= Input::get('superannuation_date');
			if($user->save())
				return Redirect::back()->with(['flash_message'=>'<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>User successfully Updated</div>']);
			else
				return Redirect::back()->with(['flash_message'=>'<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Error on Update</div>'])->withInput();

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
			return Redirect::to('/')->with(['flash_message'=>'<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Invalid Username or Password</div>'])->withInput();
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
