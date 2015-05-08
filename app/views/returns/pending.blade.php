@extends('layout')

@section('extrajs')
<script language="javascript">
	function trial(){
		console.log($('#mymy').val());
	}
</script>
@stop
@section('container')
<section id="view">
    <div class="container" style="margin-top:20px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Pending Returns</h3>
                    <!-- <hr class="star-primary"> -->
                </div>
            </div>
            <div class="row" >
                <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr id='returnstr'>
                                    <th><strong>#</strong></th>
                                    <th><strong>Officers</strong></th>
                                    <th><strong>Service</strong></th>
                                    <th><strong>Present Post</strong></th>
                                    <th><strong>Posting Place</strong></th>
                                    <th><strong>Return Year</strong></th>
                                    <th><strong>Status</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $slno = 1; ?>
                                @foreach($pendingReturns as $property)
                                <tr>
                                    <td>{{$slno}}</td>
                                    <td>{{$property->users_id}}</td>
                                    <td>{{$property->service}}</td>
                                    <td>{{$property->present_post}}</td>
                                    <td id='mymy'>{{$property->present_place_of_posting}}</td>
                                    <td>{{$property->returns_year}}</td>
                                    <td><a href="property/examine/{{$property->id}}"id="btn_get_returns" value="{{$property->id}}" onclick="trial()">{{$property->status}}</a></td>
                                </tr>
                                <?php $slno++; ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"> {{ $pendingReturns->links() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>
</section>
@stop