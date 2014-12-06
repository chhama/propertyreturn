<?php 
	$thisyear = date('Y');
	$defaulters = User::where('last_filed_year','<',$thisyear)->where('user_type','=','employee')->join('departments','users.department_id','=','departments.id')->paginate(10,['users.name','users.mobile','departments.name as dept_name','users.username']);

	echo "<table class='table table-hover table-striped'>
		<thead>
			<tr>
				<th>Sl. No.</th>
				<th>Name</th>
				<th>Department</th>
			</tr>
		</thead>
		<tbody>";
		$i=1;
		$mobiles='';
	foreach($defaulters as $defaulter):
		echo "<tr><td>".$i++."</td><td>".$defaulter->name."</td><td>".$defaulter->dept_name."</td></tr>";
		$mobiles=$mobiles.$defaulter->mobile;
		$mobiles=$mobiles.",";
	endforeach;
	echo "</tbody></table>";
	
	$defaulters->links();
	$mobiles=rtrim($mobiles, ",");	
 ?>
 	{{ Form::open(['route'=>'property.notify','method'=>'post','id'=>'returns_notify','class'=>'form-horizontal']) }}
 	{{Form::hidden('mobile_list',$mobiles)}}
	{{Form::submit('Send reminder',['class'=>'form-control btn btn-success'])}}
	{{Form::close()}}