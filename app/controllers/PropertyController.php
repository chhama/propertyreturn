<?php

class PropertyController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth',['except'=>'getreturns']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$propertySubmitted = Property::where("status",'=','Submitted')->orderBy('created_at')->paginate();
		$index = $propertySubmitted->getPerPage() * ($propertySubmitted->getCurrentPage()-1) + 1;
		return View::make('returns.index')->with(array(
											'propertySubmitted'=>$propertySubmitted,
											'index'	=> $index
											));
	}

	public function getreturns()
	{
		// dd(Input::all());
		$data = Property::where("users_id","=",Input::get("user_id"))->where("returns_year","=",Input::get("select_year"))->leftJoin('users','property.users_id','=','users.id')->first();
		return Response::json($data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$latest_year_filed = DB::table("property")->where("users_id","=",Auth::user()->id)->select('returns_year')->orderBy('returns_year','desc')->first();
		if($latest_year_filed==NULL)
			$returns_year=date('Y');
		else
			$returns_year=$latest_year_filed->returns_year;
		// dd($latest_year_filed);
		$old_immovable = Property::where('returns_year','=',$returns_year)->where('users_id',"=",Auth::user()->id)->pluck('immovable_property');
		$old_movable = Property::where('returns_year','=',$returns_year)->where('users_id',"=",Auth::user()->id)->pluck('movable_property');
		
		//->where('id','=',Auth::user()->id)->get();
		// $old_property_json=json_decode($old_property);
		// $pp=json_decode ($old_property_json[0]->movable_property);
		
		if ($latest_year_filed != NULL && $returns_year == date('Y'))
			return View::make('returns/submitted');		
		else 
			return View::make('returns/create',compact('old_movable','old_immovable'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// echo '<pre>';
		// dd(Input::all());
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
			$property->returns_year = date('Y');
			$property->movable_property = json_encode(Input::only('movable_desc_old','movable_price_old','movable_in_whose_name_old','movable_how_acq_old','movable_remarks_old','movable_description','movable_price','movable_in_whose_name','movable_how_acquired','movable_remarks','add_movable_description','add_movable_price','add_movable_in_whose_name','add_movable_how_acquired','add_movable_remarks'));
			$property->immovable_property = json_encode(Input::except('service','present_place_of_posting','basic_pay','present_post','pay_band','present_pay','_token','name_of_officer','date_of_entry','date_of_superannuation','movable_desc_old','movable_price_old','movable_in_whose_name_old','movable_how_acq_old','movable_remarks_old','movable_description','movable_price','movable_in_whose_name','movable_how_acquired','movable_remarks','add_movable_description','add_movable_price','add_movable_in_whose_name','add_movable_how_acquired','add_movable_remarks','otp'));
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

			$user = User::find(Auth::user()->id);
			$user->last_filed_year = date("Y-m-d H:i:s");
			if($property->save() && $user->save())
				return Redirect::back()->with(['flash_message'=>'Property Returns submitted successfully.']);
			else
				return Redirect::back()->with(['flash_message'=>'<div class="alert alert-success alert-warning"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Property Returns submission failed.</div>']);

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

    public function notify()
    {
    	$phones=Input::get('mobile_list');
    	$year=date('Y');
    	include("../app/config/local/sms.php");
    	$post = curl_init();
		curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".$user."&pwd=".$password."&senderid=".$sender."&to=".$phones."&msg=".urlencode("Reminder: Please file your annual property returns by 10-10-$year")."&route=T");
		//curl_setopt($post, CURLOPT_URL, "$url/sendsms?uname=".urlencode($user)."&pwd=".urlencode($pass)."&senderid=".urlencode($sender)."&to=".$phone."&msg=".urlencode("One Time Password for submitting Property Returns form is $otp.")."&route=T");
		if(curl_exec($post))
		{
			curl_close($post);
	    	return Redirect::back()->with('flash_message','Reminder sent successfully.');
    	}
    }

    public function pendingreturns()
    {
    	$pendingReturns = Property::where("status",'=','Submitted')->orderBy('created_at')->paginate(10);
    	// $user=Property::find(1)->user->name;
    	// print_r($user);
    	// exit;
    	return View::make('returns.pending',compact('pendingReturns'));
    }

    public function examine($id)
    {
    	$property = Property::find($id);
    	$userid=$property->users_id;
    	$officer = User::find($userid);
    	$this_year=$property->returns_year;
    	$previous_property=Property::where('users_id','=',$userid)->where('returns_year','!=',$this_year)->orderBy('returns_year','desc')->first();
    	 // dd($userid);
    	 if($previous_property!=NULL)
    	return View::make('returns.examine',compact('property','officer','previous_property'));
    	else
    	return View::make('returns.examine',compact('property','officer'));

    }

    public function finalize()
    {
    	$property=Property::find(Input::get('property_id'));
    	if(\Request::input('approve_btn'))
    			$property->status='Approved';
    	else
    		if(\Request::input('reject_btn'))
    			$property->status='Rejected';

    	if($property->save())
    	return Redirect::route('pendingreturns');

    }

}
