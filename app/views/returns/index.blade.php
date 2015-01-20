@extends('layout')

@section('container')

<section id="view">
    <div class="container" style="margin-top:20px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Property Lists</h3>
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
                                <?php $slno = 0; ?>
                                @foreach($propertySubmitted as $property)
                                <tr>
                                    <td>{{$index+$slno}}</td>
                                    <td>{{$property->users_id}}</td>
                                    <td>{{$property->service}}</td>
                                    <td>{{$property->present_post}}</td>
                                    <td>{{$property->present_place_of_posting}}</td>
                                    <td>{{$property->returns_year}}</td>
                                    <td><a href="" id="btn_get_returns">{{$property->status}}</a></td>
                                </tr>
                                <?php $slno++; ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"> {{ $propertySubmitted->links() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>
</section>

@stop

@section('extrajs')
    <script language="javascript">
    
    $(function(){
        $('#department_id').change(function() {
                $.ajax({
                    type: 'get',
                    data: 'dept_id='+$(this).val(),
                    url: 'getemployeelist',
                    datatype: 'json',
                }).success(function(officers){
                    var resultrow='';
                    if(officers) {
                        resultrow = '<select id="select_officer_id" name="select_officer" class="form-control">';
                        var len = officers.length;
                        for(var i=0;i<len;i++){
                            resultrow += '<option value="'+officers[i].id+'">'+officers[i].name+'</option>';
                        }
                        resultrow +='</select>';
                    }
                    else{
                        resultrow = 'No officers match the criteria given';
                    }
                    if(officers.length == 0) {
                        resultrow = '<div class="btn alert-warning">No officers in the department.</div>';
                    }
                    else {
                        $("#returnsyear").removeClass('hidden');
                    }
                    $("#employeeholder").html(resultrow);
            });
            
            $('#btn_print').click(function(){
                $('#returnsprint').printElement();
            });

        });
    


  
        $('#btn_get_returns').click(function(){
            $.ajax({
                type: 'get',
                url: "getreturns?user_id="+$("#select_officer_id").val()+"&select_year="+$("#select_year_id").val(),
                datatype: 'json',
            }).success(function(officer){
                console.log(officer);
                var immovable_row = '';
                var movable_row = '';
                if(officer.immovable_property==undefined && officer.movable_property==undefined){
                    immovable_row = "<div class='btn alert-warning'>No record found for the search criteria given.</div>";
                    movable_row = "";
                }
                else {

                var immovable = JSON.parse(officer.immovable_property);
                var movable = JSON.parse(officer.movable_property);
                

                

                if(officer) {
                    
                var immovable_row =   '<div class="panel panel-default col-lg-12">'
                                +'<div class="panel-dheading"><h4>Annual Statement of Property as on 31<sup>st</sup> December '+$("#select_year_id").val()+'</h4>'
                                +'</div>'
                                +'<div class="panel-body">'
                                +'<table class="table table-hover table-striped table-bordered">'
                                +'<tr><td>Name of officer</td><td>'+officer.name+'</td></tr>'
                                +'<tr><td>Service</td><td>'+officer.service+'</td></tr>'
                                +'<tr><td>Date of first entry into service</td><td>'+officer.entry_into_service+'</td></tr>'
                                +'<tr><td>Date of Superannuation</td><td>'+officer.superannuation_date+'</td></tr>'
                                +'<tr><td>Present Place of Posting</td><td>'+officer.present_place_of_posting+'</td></tr>'
                                +'<tr><td>Basic Pay</td><td>'+officer.basic_pay+'</td></tr>'
                                +'<tr><td>Present Post</td><td>'+officer.present_post+'</td></tr>'
                                +'<tr><td>Pay Band and Grade Pay</td><td>'+officer.pay_band_and_grade_pay+'</td></tr>'
                                +'<tr><td>Present Enolument</td><td>'+officer.present_enolument+'</td></tr></table>'
                                +'<h3>Immovable Property</h3>'
                                +'<table class="table table-hover table-striped table-bordered">'
                                +'<thead><tr><th>Name of Dist. Sub.Division Taluk and Village in which property is situated (Full location and postal address)</th>'
                                +'<th>Name & Details of properties (in case of land, area & pass no. & date/but in case of buildings, type of building with specification to be indicated)</th>'
                                +'<th>Cost of acquirement of land with date/cost of the building constn. with date of starting the work and date of completion.</th>'
                                +'<th>Present Value</th>'
                                +'<th>Name of Owner. If not in own name, state in whose name held and his/her relationship to the Govt. Servant</th>'
                                +'<th>How acquired whether by purchase, lease**, mortgate, inheritance, gift or otherwise, and eate of acquisition & name with details of person(s) from whom acquired.</th>'
                                +'<th>Annual income from the property</th>'
                                +'<th>Remarks</th></tr></thead>'
                                +'<tbody>'    
                if(immovable){
                    if(immovable.immovable_subdivision != undefined) {
                        var len = immovable.immovable_subdivision.length;
                        for(var i=0;i<len;i++){
                            immovable_row += "<tr><td>"+immovable.immovable_subdivision[i]+"</td><td>"+immovable.immovable_prop_details[i]+"</td><td>"+immovable.immovable_cost[i]+"</td><td>"+immovable.immovable_present_value[i]+"</td><td>"
                            +immovable.immovable_owner[i]+"</td><td>"+immovable.immovable_how_acquired[i]+"</td><td>"+immovable.immovable_annual_income[i]+"</td><td>"+immovable.immovable_remarks[i]+"</td></tr>";
                   
                        }
                    }
                }
                
            }

          
            if(immovable) {
                if(immovable.add_subdivision) {
                    immovable_row += "<tr><td>"+immovable.add_subdivision+"</td><td>"+immovable.add_prop_details+"</td><td>"+immovable.add_cost+"</td><td>"+immovable.add_present_value+"</td><td>"
                    +immovable.add_owner+"</td><td>"+immovable.add_how_acquired+"</td><td>"+immovable.add_annual_income+"</td><td>"+immovable.add_remarks+"</td></tr>";
                    }
               }

                var movable_row ='</tbody></table><h3>Movable Property</h3>'
                +'<table class="table table-hover table-striped table-bordered">'
                +'<thead><tr><th>Description of items</th>'
                +'<th>Price of value at the time of acquisition and or the total payments up to the date of return, as the case may be, in case of articles purchased/on hire purchase or instalments basis.</th>'
                +'<th>If not own name & address of the person in whose name & his/her relationship with the Govt. servant. </th>'
                +'<th>How acquired. Approximate date of acquisition</th>'
                +'<th>Remarks</th>'
                +'</tr></thead><tbody>'
                
                
                if(movable) {
                    if(movable.movable_description != undefined) {
                        var movlen = movable.movable_description.length;
                        for(var i=0;i<movlen;i++) {
                            movable_row += "<tr><td>"+movable.movable_description[i]+"</td><td>"+movable.movable_price[i]+"</td><td>"+movable.movable_in_whose_name[i]+"</td><td>"
                            +movable.movable_how_acquired[i]+"</td><td>"+movable.movable_remarks[i]+"</td></tr>"
                    }
                }
                    if(movable.add_movable_description != undefined) {
                        movable_row += "<tr><td>"+movable.add_movable_description+"</td><td>"+movable.add_movable_price+"</td><td>"+movable.add_movable_in_whose_name+"</td><td>"
                        +movable.add_movable_how_acquired+"</td><td>"+movable.add_movable_remarks+"</td></tr>"
                    }
                }



                movable_row += '</tbody></table></div></div>';

            }
                


                $("#singlereturns").html(immovable_row);
                $("#single_movable").html(movable_row);
                $("#returnshref").click();
                $("#content-modal").prev().removeClass("modal-backdrop");
                // console.log(data.immovable_property);
            });
        });
});
    </script>
@stop