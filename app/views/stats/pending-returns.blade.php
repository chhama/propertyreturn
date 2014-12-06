<?php 
	$thisyear = date('Y');
	$defaulters = User::where('last_filed_year','<',$thisyear)->where('user_type','=','employee')->join('departments','users.department_id','=','departments.id')->paginate(10,['users.name','departments.name as dept_name','users.username']);

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
	foreach($defaulters as $defaulter):
		echo "<tr><td>".$i++."</td><td>".$defaulter->name."</td><td>".$defaulter->dept_name."</td></tr>";
	endforeach;
	echo "</tbody></table>";
	

	$defaulters->links();

	
 ?>
 	{{ Form::open(['route'=>'property.notify','method'=>'post','id'=>'returns_notify','class'=>'form-horizontal']) }}
	{{Form::submit('Send reminder',['class'=>'form-control btn btn-success'])}}
	{{Form::close()}}