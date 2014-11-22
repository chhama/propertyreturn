<?php 

	$officers=User::select('id')->where('user_type','=','employee')->count();
	$totaldept=Department::select('id')->count();
	
 ?>


<a class="btn btn-lg btn-success" href="#">
  <i class="fa fa-users fa-2x pull-left"></i>  {{ $officers }} Officers </a>
<p></p>
<a class="btn btn-lg btn-info" href="#">
  <i class="fa fa-university fa-2x pull-left"></i>  {{ $totaldept }} Departments </a>