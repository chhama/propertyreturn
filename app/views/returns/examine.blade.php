@extends('layout')

@section('container')
<div class="container">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Approve Returns</h3>
			</div>
			{{Form::open(['route'=>'property.finalize','class'=>'form form-horizontal'])}}
			<div class="panel-body">
				<div class="form-group">
						{{Form::label('off_name','Name',['class'=>'col-sm-4 '])}}
					<div class="col-sm-5">
						{{$officer->name}}

					</div>
				</div>

				<div class="form-group">
						{{Form::label('entry_date','Date of first entry into Government service',['class'=>'col-sm-4 '])}}
					<div class="col-sm-5">
						{{$officer->entry_into_service}}
					</div>
				</div>
				
				<div class="form-group">
						{{Form::label('superannuation_date','Superannuation',['class'=>'col-sm-4 '])}}
					<div class="col-sm-5">
						{{$officer->superannuation_date}}
					</div>
				</div>

				<div class="form-group">
						{{Form::label('service','Service',['class'=>'col-sm-4 '])}}
					<div class="col-sm-5">
						{{$property->service}}
					</div>
				</div>

				<div class="form-group">
						{{Form::label('present_place_of_posting','Present place of posting',['class'=>'col-sm-4 '])}}
					<div class="col-sm-5">
						{{$property->present_place_of_posting}}
					</div>
				</div>

				<div class="form-group">
						{{Form::label('basic_pay','Basic Pay',['class'=>'col-sm-4 '])}}
					<div class="col-sm-5">
						{{$property->basic_pay}}
					</div>
				</div>

				<div class="form-group">
						{{Form::label('present_post','Present post held',['class'=>'col-sm-4 '])}}
					<div class="col-sm-5">
						{{$property->present_post}}
					</div>
				</div>

				<div class="form-group">
						{{Form::label('pay_band','Pay Band',['class'=>'col-sm-4 '])}}
					<div class="col-sm-5">
						{{$property->pay_band_and_grade_pay}}
					</div>
				</div>

				<div class="form-group">
						{{Form::label('enolument','Present Enolument',['class'=>'col-sm-4 '])}}
					<div class="col-sm-5">
						{{$property->present_enolument}}
					</div>
				</div>
				<hr>
				<h4>Immovable Property</h4>

				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Name of Dist. Sub.Division Taluk and Village in which property is situated (Full location and postal address)</th>
							<th>Name & Details of properties (in case of land, area & pass no. & date/but in case of buildings, type of building with specification to be indicated)</th>
							<th>Cost of acquirement of land with date/cost of the building constn. with date of starting the work and date of completion.</th>
							<th>Present Value</th>
							<th>Name of Owner. If not in own name, state in whose name held and his/her relationship to the Govt. Servant</th>
							<th>How acquired whether by purchase, lease**, mortgate, inheritance, gift or otherwise, and eate of acquisition & name with details of person(s) from whom acquired.</th>
							<th>Annual income from the property</th>
							<th>Remarks</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
							
							$item = json_decode($property->immovable_property);

							if(isset($previous_property)) {
							
								$old_item=json_decode($previous_property->immovable_property);
								echo "<tr><td colspan=8><strong>Returns from the previous year filed</strong></td></tr>";
								/*
								Returns for the previous year filed
								*/

								if(isset($old_item->immov_subdiv_old)){
										$lngth = count($old_item->immov_subdiv_old);
										
										for($i=0;$i<$lngth;$i++){
											echo "<tr><td>".$old_item->immov_subdiv_old[$i]."</td><td>".$old_item->immov_prop_details_old[$i]."</td><td>"
											.$old_item->immov_cost_old[$i]."</td><td>".$old_item->immov_present_value_old[$i]."</td><td>"
											.$old_item->immov_owner_old[$i]."</td><td>".$old_item->immov_how_acq_old[$i]."</td><td>"
											.$old_item->immov_annual_income_old[$i]."</td><td>".$old_item->immov_remarks_old[$i]."</td></tr>";

									}
								}


								if(isset($old_item->immovable_subdivision)){
										$lngth = count($old_item->immovable_subdivision);
										
										for($i=0;$i<$lngth;$i++){
											echo "<tr><td>".$old_item->immovable_subdivision[$i]."</td><td>".$old_item->immovable_prop_details[$i]."</td><td>"
											.$old_item->immovable_cost[$i]."</td><td>".$old_item->immovable_present_value[$i]."</td><td>"
											.$old_item->immovable_owner[$i]."</td><td>".$old_item->immovable_how_acquired[$i]."</td><td>"
											.$old_item->immovable_annual_income[$i]."</td><td>".$old_item->immovable_remarks[$i]."</td></tr>";

									}
								}


								echo "<tr><td>".$old_item->add_subdivision."</td>
								<td>".$old_item->add_prop_details."</td>
								<td>".$old_item->add_cost."</td>
								<td>".$old_item->add_present_value."</td>
								<td>".$old_item->add_owner."</td>
								<td>".$old_item->add_how_acquired."</td>
								<td>".$old_item->add_annual_income."</td>
								<td>".$old_item->add_remarks."</td></tr>";

								echo "<tr><td colspan=8><strong>Returns for the current year</strong></td></tr>";
							}

							/*
							returns for the current year
							*/
							if(isset($item->immov_subdiv_old)){
									$lngth = count($item->immov_subdiv_old);
									
									for($i=0;$i<$lngth;$i++){
										echo "<tr><td>".$item->immov_subdiv_old[$i]."</td><td>".$item->immov_prop_details_old[$i]."</td><td>"
										.$item->immov_cost_old[$i]."</td><td>".$item->immov_present_value_old[$i]."</td><td>"
										.$item->immov_owner_old[$i]."</td><td>".$item->immov_how_acq_old[$i]."</td><td>"
										.$item->immov_annual_income_old[$i]."</td><td>".$item->immov_remarks_old[$i]."</td></tr>";

								}
							}


							if(isset($item->immovable_subdivision)){
									$lngth = count($item->immovable_subdivision);
									
									for($i=0;$i<$lngth;$i++){
										echo "<tr><td>".$item->immovable_subdivision[$i]."</td><td>".$item->immovable_prop_details[$i]."</td><td>"
										.$item->immovable_cost[$i]."</td><td>".$item->immovable_present_value[$i]."</td><td>"
										.$item->immovable_owner[$i]."</td><td>".$item->immovable_how_acquired[$i]."</td><td>"
										.$item->immovable_annual_income[$i]."</td><td>".$item->immovable_remarks[$i]."</td></tr>";

								}
							}


							echo "<tr><td>".$item->add_subdivision."</td>
							<td>".$item->add_prop_details."</td>
							<td>".$item->add_cost."</td>
							<td>".$item->add_present_value."</td>
							<td>".$item->add_owner."</td>
							<td>".$item->add_how_acquired."</td>
							<td>".$item->add_annual_income."</td>
							<td>".$item->add_remarks."</td></tr>";
						
						?>
					</tbody>
				</table>
				<hr>
				<h4>Movable Property</h4>
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Description of items</th>
							<th>Price of value at the time of acquisition and or the total payments up to the date of return, as the case may be, in case of articles purchased/on hire purchase or instalments basis.</th>
							<th>If not own name & address of the person in whose name & his/her relationship with the Govt. servant.</th>
							<th>How acquired. Approximate date of acquisition</th>
							<th>Remarks</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
							$json = json_decode($property->movable_property);

							if(isset($previous_property)){
								$prev_year = json_decode($previous_property->movable_property);

								echo "<tr><td colspan=5><strong>Returns from the previous year filed</strong></td></tr>";

								/*
								Returns for the previous year
								*/

								if(isset($prev_year->movable_desc_old)){
									$lngth=count($prev_year->movable_desc_old);
									
									for($i=0;$i<$lngth;$i++){
										echo "<tr><td>".$prev_year->movable_desc_old[$i]."</td>
										<td>".$prev_year->movable_price_old[$i]."</td><td>".$prev_year->movable_in_whose_name_old[$i]."</td>
										<td>".$prev_year->movable_how_acq_old[$i]."</td><td>".$prev_year->movable_remarks_old[$i]."</td></tr>";
									}
								}

								if(isset($prev_year->movable_description)){
									$lngth=count($prev_year->movable_description);
									
									for($i=0;$i<$lngth;$i++){
										echo "<tr><td>".$prev_year->movable_description[$i]."</td>
										<td>".$prev_year->movable_price[$i]."</td><td>".$prev_year->movable_in_whose_name[$i]."</td>
										<td>".$prev_year->movable_how_acquired[$i]."</td><td>".$prev_year->movable_remarks[$i]."</td></tr>";
									}
								}
								echo "<tr><td>".$prev_year->add_movable_description."</td>
								<td>".$prev_year->add_movable_price."</td>
								<td>".$prev_year->add_movable_in_whose_name."</td>
								<td>".$prev_year->add_movable_how_acquired."</td>
								<td>".$prev_year->add_movable_remarks."</td></tr>";


								/*
								Returns for this year
								*/
								echo "<tr><td colspan=5><strong>Returns for the current year</strong></td></tr>";

							}
							if(isset($json->movable_desc_old)){
								$lngth=count($json->movable_desc_old);
								
								for($i=0;$i<$lngth;$i++){
									echo "<tr><td>".$json->movable_desc_old[$i]."</td>
									<td>".$json->movable_price_old[$i]."</td><td>".$json->movable_in_whose_name_old[$i]."</td>
									<td>".$json->movable_how_acq_old[$i]."</td><td>".$json->movable_remarks_old[$i]."</td></tr>";
								}
							}

							if(isset($json->movable_description)){
								$lngth=count($json->movable_description);
								
								for($i=0;$i<$lngth;$i++){
									echo "<tr><td>".$json->movable_description[$i]."</td>
									<td>".$json->movable_price[$i]."</td><td>".$json->movable_in_whose_name[$i]."</td>
									<td>".$json->movable_how_acquired[$i]."</td><td>".$json->movable_remarks[$i]."</td></tr>";
								}
							}
							echo "<tr><td>".$json->add_movable_description."</td>
							<td>".$json->add_movable_price."</td>
							<td>".$json->add_movable_in_whose_name."</td>
							<td>".$json->add_movable_how_acquired."</td>
							<td>".$json->add_movable_remarks."</td></tr>";
						?>
					
					</tbody>
				</table>
				
				
				
				<!-- {{$property}}	 -->
				
				
			</div>
			<input type="hidden" name="property_id" value={{$property->id}}>
			<div class="panel-footer">
				{{Form::submit('Approve',['name' =>'approve_btn','class'=>'btn btn-info','id'=>'btn_approve'])}}
				{{Form::submit('Reject',['name'=>'reject_btn','class'=>'btn btn-warning','id'=>'btn_reject'])}}
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>

@stop