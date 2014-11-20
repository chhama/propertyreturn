<?php

class PropertyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('property.index');
	}

	public function getreturns()
	{
		$data = Property::where("users_id","=",Input::get('user_id'))->leftJoin('users','property.users_id','=','users.id')->first();
		// dd($data);
		return Response::json($data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
				// return View::make('property.create');

		return View::make('returns/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$sessionOTP	= Session::get('otp');
		$enterOTP	= Input::get('otp');
		if($sessionOTP == $enterOTP){
			$property = new Property();
			
			$property->users_id=Auth::user()->id;
			$property->service = Input::get('service');
			$property->present_place_of_posting = Input::get('present_place_of_posting');
			$property->basic_pay = Input::get('basic_pay');
			$property->present_post = Input::get('present_post');
			$property->pay_band_and_grade_pay = Input::get('pay_band');
			$property->present_enolument = Input::get('present_pay');
			$property->movable_property = json_encode(Input::only('movable_description','movable_price','movable_in_whose_name','movable_how_acquired','movable_remarks','add_movable_description','add_movable_price','add_movable_in_whose_name','add_movable_how_acquired','add_movable_remarks'));
			$property->immovable_property = json_encode(Input::except('service','present_place_of_posting','basic_pay','present_post','pay_band','present_pay','_token','name_of_officer','date_of_entry','date_of_superannuation','movable_description','movable_price','movable_in_whose_name','movable_how_acquired','movable_remarks','add_movable_description','add_movable_price','add_movable_in_whose_name','add_movable_how_acquired','add_movable_remarks'));
			// dd($property->movable_property);
			$input = ['user_id'=>$property->users_id,'place_of_posting'=>$property->present_place_of_posting,'basic_pay'=>$property->basic_pay,
			'present_post'=>$property->present_post,'pay_band'=>$property->pay_band_and_grade_pay,'enolument'=>$property->present_enolument];
			$validator = Validator::make(
				$input,
				['user_id' => 'required',
				'place_of_posting' => 'required',
				'basic_pay' => 'required',
				'present_post' => 'required',
				'pay_band' => 'required',
				'enolument' => 'required|numeric']
			);

			if($validator->fails()){
				return Redirect::back()->withErrors($validator);
			}

			if($property->save())
				return Redirect::back();
		} 


		// $gaga = json_encode(Input::get('immovable_subdivision'));	
		// echo $gaga;
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

	public function otp()
    {     

        $otp = rand(1000,9999);
        Session::set('otp',$otp);
        $message = 'One Time Password for Vigilance Property Submission: '.$otp;
        $phone = Auth::user()->mobile;

        include("../app/config/local/sms.php");
        

		$post = curl_init();
		curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".$user."&pwd=".$password."&senderid=".$sender."&to=".$phone."&msg=".urlencode("One Time Password for submitting Property Returns form is $otp.")."&route=T");
		//curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".urlencode($user)."&pwd=".urlencode($pass)."&senderid=".urlencode($sender)."&to=".$phone."&msg=".urlencode("One Time Password for submitting Property Returns form is $otp.")."&route=T");
		curl_exec($post);
		curl_close($post);

    }


}
