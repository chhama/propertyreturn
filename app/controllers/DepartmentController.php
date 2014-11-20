<?php

class DepartmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$departmentAll = Department::orderBy('name')->paginate();
		$index = $departmentAll->getPerPage() * ($departmentAll->getCurrentPage()-1) + 1;
		return View::make('departments.index')->with(array(
										'departmentAll'	=> $departmentAll,
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
		//return View::make('departments.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$department = new Department();
		$department->name 				= Input::get('name');
		if($department->save())
			return Redirect::back()->with(['flash_message'=>'Department successfully created','msgtype'=>'success']);
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
		$departmentAll = Department::orderBy('name')->paginate();
		$index = $departmentAll->getPerPage() * ($departmentAll->getCurrentPage()-1) + 1;
		$departmentById = Department::find($id);
		return View::make('departments.edit')->with(array(
										'departmentById'	=> $departmentById,
										'departmentAll'	=> $departmentAll,
										'index'		=> $index
										));
		// return View::make('departments.edit');	
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$department = Department::find($id);
		$department->name 	= Input::get('name');
		if($department->save())
			return Redirect::back()->with(['flash_message'=>'Department successfully Updated','msgtype'=>'success']);
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Department::destroy($id);
		return Redirect::route('departments.index');
	}


}
