@extends('layout')



@section('container')
    <script language="javascript">

        function removeRow(rnum) {
            $('#rowNum'+rnum).remove();
        }

        function removeMovRow(rnum) {
            $('#movRowNum'+rnum).remove();
        }

        function interactionRequestOTP () {
             $.ajax({
                url: "{{ URL::route('property.otp')}}",
                data: {'id': '123'},
                type: 'GET', 
            }).success(function(data){
                $('#otp').removeClass('hidden');
                $('#submitbutton').removeClass('hidden');
                // console.log(data);
                //$('#hello1').html(data);
            })
        }
    </script>

    <!-- Header -->
    <header class="form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if(Session::has('flash_message'))
                        <div>
                            <h2>{{ Session::get('flash_message') }}</h2>
                        </div>
                    @endif
                    <div class="intro-text">
                        <span class="formheader-small">File your returns </span>
                    </div>
                    {{Form::open(['route'=>'property.store','method'=>'POST','id'=>'returns_form','class'=>'form-horizontal'])}}
                        <div class="col-md-6 tp10">
                            
                            <fieldset>
                            
                                <div class="form-group">
                                    <!-- <div class="input-group"> -->
                                        <!-- <span class="input-group-addon officer-info-label control-label col-md-9">Name of officer</span> -->
                                        <label for="name_of_officer" class="control-label col-xs-5 text-left">Name</label>
                                            <div class="col-xs-7">
                                                {{ Form::text('name_of_officer',Input::old('name_of_officer',Auth::user()->name), ['class'=>'form-control','id'=>'officer_name','required','disabled']) }}   
                                            </div>
                                    <!-- </div> -->
                                </div>

                                <div class="form-group">
                                    <label for="date_of_entry" class="control-label col-xs-5 text-left">Date of first entry into Government Service</label>
                                        <div class="col-xs-7">
                                            {{ Form::text('date_of_entry',Input::old('date_of_entry',date("d-m-Y",strtotime(Auth::user()->entry_into_service))), ['class'=>'form-control', 'placeholder'=>'As in your service record','required','disabled']) }}
                                        </div>
                                </div>

                                <div class="form-group">
                                     <label for="date_of_superannuation" class="control-label col-xs-5 text-left">Date of Superannuation</label>
                                        <div class="col-xs-7">
                                            {{ Form::text('date_of_superannuation',Input::old('date_of_superannuation',date("d-m-Y",strtotime(Auth::user()->superannuation_date))), ['class'=>'form-control', 'placeholder'=>'Pension date','required','disabled']) }}
                                        </div>
                                </div>    
                               
                                <div class="form-group">
                                     <label for="service" class="control-label col-xs-5 text-left">Service</label>
                                        <div class="col-xs-7">
                                            {{ Form::text('service',Input::old('service',null), ['class'=>'form-control', 'placeholder'=>'IAS/MES/MSS etc.','required']) }}
                                        </div>
                                </div>
                            </fieldset>

                        </div>

                    <div class="col-md-6 tp10">
                        <fieldset>
                           
                                <div class="form-group">
                                     <label for="present_place_of_posting" class="control-label col-xs-4 text-left">Present place of posting</label>
                                        <div class="col-xs-8">
                                            {{ Form::text('present_place_of_posting',Input::old('present_place_of_posting',null), ['class'=>'form-control', 'placeholder'=>'Enter office name','required']) }}
                                        </div>
                                </div>

                                <div class="form-group">
                                     <label for="basic_pay" class="control-label col-xs-4 text-left">Basic Pay</label>
                                        <div class="col-xs-8">
                                            {{ Form::text('basic_pay',Input::old('basic_pay',null), ['class'=>'form-control', 'placeholder'=>'Enter basic pay in correct format','required']) }}
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="present_post" class="control-label col-xs-4 text-left">Present post held</label>
                                        <div class="col-xs-8">
                                            {{ Form::text('present_post',Input::old('present_post',null), ['class'=>'form-control', 'placeholder'=>'Designation','required']) }}
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="pay_band" class="control-label col-xs-4 text-left">Pay Band</label>
                                        <div class="col-xs-8">
                                            {{ Form::text('pay_band',Input::old('pay_band',null), ['class'=>'form-control', 'placeholder'=>'Pay band followed by grade pay','required']) }}
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="present_pay" class="control-label col-xs-4 text-left">Present Enoluments</label>
                                        <div class="col-xs-8">
                                            {{ Form::text('present_pay',Input::old('present_pay',null), ['class'=>'form-control', 'placeholder'=>'As in last pay','required']) }}
                                        </div>
                                </div>
                        </fieldset>
                    </div>
            <hr>

                            <ul class="nav-tabs nav" role='tablist'>
                                <li class="active"><a href="#immovable" data-toggle="tab">Immovable Property</a></li>
                                <li class=""><a href="#movable" data-toggle="tab">Movable Property</a></li>
                            </ul>
                                <div id="returnsTab" class="tab-content">

                        <!-- Immovable Table  -->
                                    <div class="table-responsive tab-pane fade active in" id='immovable'>
                                        <table class="table table-hover table-striped table-bordered" id="immovabletable">
                                        <thead>
                                            <tr id='returnstr'>
                                                <th>Name of Dist. Sub.Division Taluk and Village in which property is situated (Full location and postal address)</th>
                                                <th>Name & Details of properties (in case of land, area & pass no. & date/but in case of buildings, type of building with specification to be indicated)</th>
                                                <th>Cost of acquirement of land with date/cost of the building constn. with date of starting the work and date of completion.</th>
                                                <th>Present Value</th>
                                                <th>Name of Owner. If not in own name, state in whose name held and his/her relationship to the Govt. Servant</th>
                                                <th>How acquired whether by purchase, lease**, mortgate, inheritance, gift or otherwise, and date of acquisition & name with details of person(s) from whom acquired.</th>
                                                <th>Annual income from the property</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr id='returnstr'>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                                <th>7</th>
                                                <th>8</th>
                                                <th>9</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan='9'><strong>Returns for the previous year</strong></td>
                                            </tr>

                                            <?php 
                                                    $old_immovable = json_decode($old_immovable);
                                                    $old_movable = json_decode($old_movable);
                                                        // dd($old_immovable);

                                             ?>

                                            <?php 

                                                if(isset($old_immovable->immov_subdiv_old)){
                                                    for($i=0;$i<count($old_immovable->immov_subdiv_old);$i++){
                                                        echo "<tr id='old_immove".$i."'><td><input type='text' name='immov_subdiv_old[]' value='".$old_immovable->immov_subdiv_old[$i]."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_prop_details_old[]' value='".$old_immovable->immov_prop_details_old[$i]."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_cost_old[]' value='".$old_immovable->immov_cost_old[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_present_value_old[]' value='".$old_immovable->immov_present_value_old[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_owner_old[]' value='".$old_immovable->immov_owner_old[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_how_acq_old[]' value='".$old_immovable->immov_how_acq_old[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_annual_income_old[]' value='".$old_immovable->immov_annual_income_old[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_remarks_old[]' value='".$old_immovable->immov_remarks_old[$i]."'  readonly class='nobg' size=10></td>";
                                                    echo '<td><button class="btn btn-sm btn-danger text-alert fa fa-trash-o fa-sm" onclick="deleteImmovableRow(this)"> Remove</button></td></tr>';
                                                    }
                                                }


                                                if(isset($old_immovable->immovable_subdivision)){
                                                    for($i=0;$i<count($old_immovable->immovable_subdivision);$i++){
                                                        echo "<tr id='old_immove".$i."'><td><input type='text' name='immov_subdiv_old[]' value='".$old_immovable->immovable_subdivision[$i]."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_prop_details_old[]' value='".$old_immovable->immovable_prop_details[$i]."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_cost_old[]' value='".$old_immovable->immovable_cost[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_present_value_old[]' value='".$old_immovable->immovable_present_value[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_owner_old[]' value='".$old_immovable->immovable_owner[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_how_acq_old[]' value='".$old_immovable->immovable_how_acquired[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_annual_income_old[]' value='".$old_immovable->immovable_annual_income[$i]."'  readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_remarks_old[]' value='".$old_immovable->immovable_remarks[$i]."'  readonly class='nobg' size=10></td>";
                                                    echo '<td><button class="btn btn-sm btn-danger text-alert fa fa-trash-o fa-sm" onclick="deleteImmovableRow(this)"> Remove</button></td></tr>';
                                                    }
                                                }

                                                if(isset($old_immovable->add_subdivision)){
                                                    echo "<tr><td><input type='text' name='immov_subdiv_old[]' value='".$old_immovable->add_subdivision."' readonly class='nobg' size=10></td>
                                                        <td> <input type='text' name='immov_prop_details_old[]' value='".$old_immovable->add_prop_details."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_cost_old[]' value='".$old_immovable->add_cost."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_present_value_old[]' value='".$old_immovable->add_present_value."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_owner_old[]' value='".$old_immovable->add_owner."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_how_acq_old[]' value='".$old_immovable->add_how_acquired."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_annual_income_old[]' value='".$old_immovable->add_annual_income."'  readonly class='nobg'  size=10></td>
                                                        <td> <input type='text' name='immov_remarks_old[]' value='".$old_immovable->add_remarks."'  readonly class='nobg'  size=10></td>
                                                        <td><button class='btn btn-sm btn-danger text-alert fa fa-trash-o fa-sm' onclick='deleteImmovableRow(this)'> Remove</button></td></tr>";
                                                }

                                             ?>
                                            <tr>
                                                <td colspan='9'><strong>Returns for the current year</strong></td>
                                            </tr>
                                            <tr>
                                                <td>{{Form::textarea('add_subdivision','',['cols'=>'16','rows'=>'3','id'=>'add_subdivision','class'=>'form-control'])}}</td>
                                                <td>{{Form::textarea('add_prop_details','',['cols'=>'16','rows'=>'3','id'=>'add_prop_details','class'=>'form-control'])}}</td>
                                                <td>{{Form::textarea('add_cost','',['cols'=>'13','rows'=>'3','id'=>'add_cost','class'=>'form-control'])}}</td>
                                                <td>{{Form::text('add_present_value','',['size'=>'9','id'=>'add_present_value','class'=>'form-control','maxlength'=>'12'])}}</td>
                                                <td>{{Form::textarea('add_owner','',['cols'=>'13','rows'=>'3','id'=>'add_owner','class'=>'form-control'])}}</td>
                                                <td>{{Form::textarea('add_how_acquired','',['cols'=>'13','rows'=>'3','id'=>'add_how_acquired','class'=>'form-control'])}}</td>
                                                <td>{{Form::text('add_annual_income','',['size'=>'9','id'=>'add_annual_income','class'=>'form-control','maxlength'=>'12'])}}</td>
                                                <td>{{Form::textarea('add_remarks','',['cols'=>'13','rows'=>'3','id'=>'add_remarks','class'=>'form-control'])}}</td>
                                                <td>
                                                <!-- <i class="btn-lg fa fa-plus fa-lg text-danger" id="btn_addrow"></i> -->
                                                <!-- <i class="fa fa-plus-circle fa-lg"></i></a> -->
                                                {{Form::button(' Add Row',['class'=>'btn btn-sm btn-success text-alert fa fa-plus fa-sm','id'=>'btn_addrow'])}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                        <!-- Movable Table -->
                                    
                                <div class="table-responsive tab-pane fade" id='movable'>
                                    <table class="table table-hover table-striped table-bordered" id="movabletable">
                                        <thead>
                                            <tr id="returnstr-movable">
                                                <th>Description of items</th>
                                                <th>Price of value at the time of acquisition and or the total payments up to the date of return, as the
                                                case may be, in case of articles purchased/on hire purchase or instalments basis.</th>
                                                <th>If not own name & address of the person in whose name & his/her relationship with the Govt. servant.</th>
                                                <th>How acquired. Approximate date of acquisition</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr id="returnstr">
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan='6'><strong>Returns for the previous year</strong></td>
                                            </tr>
                                               <?php 
                                                    if(isset($old_movable->movable_desc_old)){
                                                        for($i=0;$i<count($old_movable->movable_desc_old[$i]);$i++) {
                                                            echo "<tr id='old_move".$i."'><td><input type='text' name='movable_desc_old[]' value='".$old_movable->movable_desc_old[$i]."' readonly class='nobg' size=10></td>
                                                            <td><input type='text' name='movable_price_old[]' value='".$old_movable->movable_price_old[$i]."' readonly class='nobg' size=10></td>
                                                            <td><input type='text' name='movable_in_whose_name_old[]' value='".$old_movable->movable_in_whose_name_old[$i]."' readonly class='nobg' size=10></td>
                                                            <td><input type='text' name='movable_how_acq_old[]' value='".$old_movable->movable_how_acq_old[$i]."' readonly class='nobg' size=10></td>
                                                            <td><input type='text' name='movable_remarks_old[]' value='".$old_movable->movable_remarks_old[$i]."' readonly class='nobg' size=10></td>
                                                            <td><button class='btn btn-sm btn-danger text-alert fa fa-trash-o fa-sm' onclick='deleteMovableRow(this)'> Remove</button></td></tr>";

                                                        }
                                                    }

                                                     if(isset($old_movable->movable_description)){
                                                        for($i=0;$i<count($old_movable->movable_description);$i++) {
                                                            echo "<tr id='old_move".$i."'><td><input type='text' name='movable_desc_old[]' value='".$old_movable->movable_description[$i]."' readonly class='nobg' size=10></td>
                                                            <td><input type='text' name='movable_price_old[]' value='".$old_movable->movable_price[$i]."' readonly class='nobg' size=10></td>
                                                            <td><input type='text' name='movable_in_whose_name_old[]' value='".$old_movable->movable_in_whose_name[$i]."' readonly class='nobg' size=10></td>
                                                            <td><input type='text' name='movable_how_acq_old[]' value='".$old_movable->movable_how_acquired[$i]."' readonly class='nobg' size=10></td>
                                                            <td><input type='text' name='movable_remarks_old[]' value='".$old_movable->movable_remarks[$i]."' readonly class='nobg' size=10></td>
                                                            <td><button class='btn btn-sm btn-danger text-alert fa fa-trash-o fa-sm' onclick='deleteMovableRow(this)'> Remove</button></td></tr>";

                                                        }
                                                    }


                                                    if(isset($old_movable->add_movable_description)){
                                                        echo "<tr><td><input type='text' name='movable_desc_old[]' value='".$old_movable->add_movable_description."' readonly class='nobg' size=10></td>
                                                        <td><input type='text' name='movable_price_old[]' value='".$old_movable->add_movable_price."' readonly class='nobg' size=10></td>
                                                        <td><input type='text' name='movable_in_whose_name_old[]' value='".$old_movable->add_movable_in_whose_name."' readonly class='nobg' size=10></td>
                                                        <td><input type='text' name='movable_how_acq_old[]' value='".$old_movable->add_movable_how_acquired."' readonly class='nobg' size=10></td>
                                                        <td><input type='text' name='movable_remarks_old[]' value='".$old_movable->add_movable_remarks."' readonly class='nobg' size=10></td>
                                                        <td><button class='btn btn-sm btn-danger text-alert fa fa-trash-o fa-sm' onclick='deleteMovableRow(this)'> Remove</button></td></tr>";

                                                    }
                                             ?>
                                             <tr>
                                                <td colspan='6'><strong>Returns for the current year<strong></td>
                                            </tr>
                                            <tr>
                                                <td>{{Form::textarea('add_movable_description','',['cols'=>'20','rows'=>'3','id'=>'add_movable_description','class'=>'form-control'])}}</td>
                                                <td>{{Form::textarea('add_movable_price','',['cols'=>'20','rows'=>'3','id'=>'add_movable_price','class'=>'form-control'])}}</td>
                                                <td>{{Form::textarea('add_movable_in_whose_name','',['cols'=>'20','rows'=>'3','id'=>'add_movable_in_whose_name','class'=>'form-control'])}}</td>
                                                <td>{{Form::textarea('add_movable_how_acquired','',['cols'=>'20','rows'=>'3','id'=>'add_movable_how_acquired','class'=>'form-control'])}}</td>
                                                <td>{{Form::textarea('add_movable_remarks','',['cols'=>'20','rows'=>'3','id'=>'add_movable_remarks','class'=>'form-control'])}}</td>
                                                <td>{{Form::button(' Add Row',['class'=>'btn btn-sm btn-success text-alert fa fa-plus fa-sm','id'=>'btn_movable_addrow'])}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                

                            </div>
                        
                        <!-- OTP -->
                        
                            <div class="col-md-2">
                                <button type="button" onclick="return interactionRequestOTP()" id="interaction_request_otp" class="btn btn-info"><i class="fa fa-clock-o fa-lg"></i> Generate OTP </button>
                            </div>
                            <div class="col-md-2">
                                    {{Form::text('otp',Input::old('otp'),['placeholder'=>'Enter OTP','id'=>'otp','class'=>'form-control hidden','required'])}}
                            </div>
                        
                        <div class="col-md-2">
                                {{Form::Submit('Submit',['id'=>'submitbutton','class'=>'btn btn-primary form-control ','style'=>'width:120px;'])}}
                        </div>
                    {{Form::close()}}
                    </div>
                </div>

            </div>
            <hr>
            <div class="forminstructions">
               
                    In applicable clause to be struck out,<br>
                    * in case where it is not possible to assess the value accurately the approximate value in relation to present conditions may be indicated. <br>
                    ** Includes short term list also. <p></p>
                     Note 1. <br>
                        In this form, information may be given regarding items like (a)Jewellery owned by him (total value); (b)Silver and other precious stones
                        owned by him not forming part of jeweler (total value); (c)(i)Motor Cars,(ii)Scooter,Motor Cycles (iii) Refrigerator/all conditions, (iv)Radios/
                        Radiograms/Television set and any other articles, the value of which individually exceeds Rs.10,000/- (d)Value of items of movable property individually
                        worth less than Rs.10,000 other than articles of daily use such as clothes, books, utensils, crokery etc. added together as lump sum. <p></p>
                    Note 2. <br>
                        In column 5 may be indicated whether the property was acquired by purchase, inheritance, gift or otherwise. <p></p>
                    Note 3. <br>
                        In column 6 particulars regarding sanction obtained or report made in respect of various transactions given. <p></p>                
            

            </div>
        </div>
    </header>
    
    

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Howto</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i> Fill all your personal information
                            </div>
                        </div>
                        <img src="../img/icons/personalinfo.png" class="img-responsive" alt="">Fill all your personal information
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i> Enter your immovable assets
                            </div>
                        </div>
                        <img src="../img/icons/immovable.png" class="img-responsive" alt=""> Enter your immovable assets
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i> Enter your movable assets
                            </div>
                        </div>
                        <img src="../img/icons/movable.png" class="img-responsive" alt=""> Enter your movable assets
                    </a>
                </div>
                <!-- <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="../img/icons/game.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="../img/icons/safe.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="../img/icons/submarine.png" class="img-responsive" alt="">
                    </a>
                </div> -->
            </div>
        </div>
    </section>

    @section('extrajs')
    <script language="javascript">

            function deleteMovableRow(r) {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("movabletable").deleteRow(i);
            }

            function deleteImmovableRow(r) {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("immovabletable").deleteRow(i);
            }


        $(function() {
            $("#officer_name").focus();
            var movRowNum = 0;
            var rowNum = 0;
            function addrow() {
                rowNum++;
                var row = '<tr id="rowNum'+rowNum+'"><td><textarea name="immovable_subdivision[]" cols = "16" rows= "3" class="form-control">'+returns_form.add_subdivision.value+'</textarea></td><td><textarea name="immovable_prop_details[]" cols = "16" rows= "3" class="form-control">'+returns_form.add_prop_details.value+'</textarea></td><td><textarea name="immovable_cost[]" cols = "13" rows= "3" class="form-control">'+returns_form.add_cost.value+'</textarea></td><td><input type="text" name="immovable_present_value[]"  class="form-control" value="'+returns_form.add_present_value.value+'" size="9"></td><td><textarea name="immovable_owner[]" cols = "13" rows= "3" class="form-control">'+returns_form.add_owner.value+'</textarea></td><td><textarea name="immovable_how_acquired[]" cols = "13" rows= "3" class="form-control">'+returns_form.add_how_acquired.value+'</textarea></td><td><input type="text" name="immovable_annual_income[]"  class="form-control" value="'+returns_form.add_annual_income.value+'" size="9"></td><td><textarea name="immovable_remarks[]" cols = "13" rows= "3"  class="form-control">'+returns_form.add_remarks.value+'</textarea></td><td><button class="btn btn-sm btn-danger text-alert fa fa-trash-o fa-sm" onclick="removeRow('+rowNum+')"> Remove</button></td></tr>';
                // $('#qtycounter').val(99);
                $("#immovabletable tbody tr:last-child").before(row);

                $("#add_subdivision").val('');
                $("#add_prop_details").val('');
                $("#add_cost").val('');
                $("#add_present_value").val('');
                $("#add_owner").val('');
                $("#add_how_acquired").val('');
                $("#add_annual_income").val('');
                $("#add_remarks").val('');
                $("#add_subdivision").focus();
            }

            function addMovRow() {
                movRowNum++;
                var movRow = '<tr id="movRowNum'+movRowNum+'"><td><textarea name="movable_description[]" cols="20" rows="3" class="form-control">'+returns_form.add_movable_description.value+'</textarea></td><td><textarea name="movable_price[]" cols="20" rows="3" class="form-control">'+returns_form.add_movable_price.value+'</textarea></td><td><textarea name="movable_in_whose_name[]" cols="20" rows="3" class="form-control">'+returns_form.add_movable_in_whose_name.value+'</textarea></td><td><textarea name="movable_how_acquired[]" cols="20" rows="3" class="form-control">'+returns_form.add_movable_how_acquired.value+'</textarea></td><td><textarea name="movable_remarks[]" cols="20" rows="3" class="form-control">'+returns_form.add_movable_remarks.value+'</textarea></td><td><button class="btn btn-sm btn-danger text-alert fa fa-trash-o fa-sm" onclick="removeMovRow('+movRowNum+')"> Remove</button></td></tr>';
                $("#movabletable tbody tr:last-child").before(movRow);

                $("#add_movable_description").val('');
                $("#add_movable_price").val('');
                $("#add_movable_in_whose_name").val('');
                $("#add_movable_how_acquired").val('');
                $("#add_movable_remarks").val('');
                $("#add_movable_description").focus();
            }

            $("#btn_movable_addrow").click(function(){
                addMovRow();
            });

            $("#btn_addrow").click(function() {
                // alert('all');
                addrow();

            });

            

          
     });


    </script>
    @stop



    <!-- About Section -->
  <!--   <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>This is a Property Registration website.</p>
                </div>
                <div class="col-lg-4">
                    <p>Created by MSeGS.</p>
                </div>
               
            </div>
        </div>
    </section> -->

    <!-- Contact Section -->
<!--     <section id="view">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Us</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
 -->                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <!-- <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->
@stop