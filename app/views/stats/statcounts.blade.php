<?php 

	$officers=User::select('id')->where('user_type','=','employee')->count();
	$totaldept=Department::select('id')->count();
	$totalpending=Property::where('status','=','submitted')->count();
 ?>


<a class="btn btn-lg btn-success col-xs-12" href="property">
  <i class="fa fa-users fa-3x pull-left"></i>  {{ $officers }} Officers </a>
<div class="clearfix"><p></p></div>
<a class="btn btn-lg btn-info col-xs-12" href="departments">
  <i class="fa fa-university fa-3x pull-left"></i>  {{ $totaldept }} Departments </a>
  <div class="clearfix"><p></p></div>

<a href="pendingreturns" class="btn btn-lg btn-warning col-xs-12">
	<i class="fa fa-download fa-3x pull-left"></i> {{ $totalpending }} Pending <br> Submission 
</a>