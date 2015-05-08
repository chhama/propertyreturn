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
						<tr>
						<?php 
							$json = json_decode($property->immovable_property);
							$i=0;
							$lngth = count($json);
							echo $lngth;
							// while($json->add_prop_details[$i]) {
							echo "<td>".$json->add_subdivision[$i]."</td>
							<td>".$json->add_prop_details[$i]."</td>
							<td>".$json->add_cost[$i]."</td>
							<td>".$json->add_present_value[$i]."</td>
							<td>".$json->add_owner[$i]."</td>
							<td>".$json->add_how_acquired[$i]."</td>
							<td>".$json->add_annual_income[$i]."</td>
							<td>".$json->add_remarks[$i]."</td>";
						// }
						?>
						</tr>
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
						<tr>
						<?php 
							$json = json_decode($property->movable_property);
							echo "<td>".$json->add_movable_description."</td>
							<td>".$json->add_movable_price."</td>
							<td>".$json->add_movable_in_whose_name."</td>
							<td>".$json->add_movable_how_acquired."</td>
							<td>".$json->add_movable_remarks."</td>"
						?>
						</tr>
					</tbody>
				</table>
				
				
				
				<!-- {{$property}}	 -->
				
				
			</div>
			<div class="panel-footer">
				{{Form::submit('Approve',['name' =>'approve_btn','class'=>'btn btn-info','id'=>'btn_approve'])}}
				{{Form::submit('Reject',['class'=>'btn btn-warning','id'=>'btn_reject'])}}
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>

@stop