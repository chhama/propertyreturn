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
                //console.log('Hello');
                $('#hello1').html(data);
            })
        }
    </script>

    <!-- Header -->
    <header class="form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="formheader-small">File your returns </span>
                        <!-- <hr class="star-light"> -->
                        {{Form::open(['route'=>'property.store','method'=>'POST','id'=>'returns_form'])}}
                                <div class="col-md-6 tp10">
                        <fieldset>
                            <div class="form-group">
                                <!-- {{ Form::label('title', 'Title', ['class'=>'col-md-12 control-label']) }} -->
                                    <div class="input-group">
                                        <span class="input-group-addon officer-info-label">Name of officer</i></span>
                                        {{ Form::text('name_of_officer',Input::old('title',Auth::user()->username), ['class'=>'form-control officer-info-input', 'placeholder'=>'Enter name as in the service record','id'=>'officer_name']) }}
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon officer-info-label">Service</i></span>
                                        {{ Form::text('service',Input::old('title',null), ['class'=>'form-control officer-info-input', 'placeholder'=>'IAS/MES/MSS etc.']) }}
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon officer-info-label">Date of first entry into Government service.</i></span>
                                        {{ Form::text('date_of_entry',Input::old('title',null), ['class'=>'form-control officer-info-input', 'placeholder'=>'As in your service record']) }}
                                    </div>
                                    <div class="input-group">
                                         <span class="input-group-addon officer-info-label">Date of Superannuation</i></span>
                                        {{ Form::text('date_of_superannuation',Input::old('title',null), ['class'=>'form-control officer-info-input', 'placeholder'=>'Pension date']) }}
                                    </div>    
                           
                        </fieldset>
                                </div>

                                <div class="col-md-6 tp10">
                        <fieldset>
                            <div class="form-group">
                                <!-- {{ Form::label('title', 'Title', ['class'=>'col-md-12 control-label']) }} -->
                                     <div class="input-group">
                                         <span class="input-group-addon officer-info-label">Present place of posting</i></span>
                                        {{ Form::text('present_place_of_posting',Input::old('title',null), ['class'=>'form-control officer-info-input', 'placeholder'=>'Enter office name']) }}
                                    </div> 
                                    <div class="input-group">
                                        <span class="input-group-addon officer-info-label">Basic Pay</i></span>
                                        {{ Form::text('basic_pay',Input::old('title',null), ['class'=>'form-control officer-info-input', 'placeholder'=>'Enter basic pay in correct format']) }}
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon officer-info-label">Present post held</i></span>
                                        {{ Form::text('present_post',Input::old('title',null), ['class'=>'form-control officer-info-input', 'placeholder'=>'Designation']) }}
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon officer-info-label">Pay Band and Grade Pay</i></span>
                                        {{ Form::text('pay_band',Input::old('title',null), ['class'=>'form-control officer-info-input', 'placeholder'=>'Pay band followed by grade pay']) }}
                                    </div>
                                    <div class="input-group">
                                         <span class="input-group-addon officer-info-label">Present Enoluments</i></span>
                                        {{ Form::text('present_pay',Input::old('title',null), ['class'=>'form-control officer-info-input', 'placeholder'=>'As in last pay']) }}
                                    </div>    
                        </fieldset>
                                </div>
            <br>
                           

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
                                                <th>How acquired whether by purchase, lease**, mortgate, inheritance, gift or otherwise, and eate of acquisition & name with details of person(s) from whom acquired.</th>
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
                                                <td>{{Form::textarea('add_subdivision','',['cols'=>'16','rows'=>'3','id'=>'add_subdivision'])}}</td>
                                                <td>{{Form::textarea('add_prop_details','',['cols'=>'16','rows'=>'3','id'=>'add_prop_details'])}}</td>
                                                <td>{{Form::textarea('add_cost','',['cols'=>'13','rows'=>'3','id'=>'add_cost'])}}</td>
                                                <td>{{Form::text('add_present_value','',['size'=>'9','id'=>'add_present_value'])}}</td>
                                                <td>{{Form::textarea('add_owner','',['cols'=>'13','rows'=>'3','id'=>'add_owner'])}}</td>
                                                <td>{{Form::textarea('add_how_acquired','',['cols'=>'13','rows'=>'3','id'=>'add_how_acquired'])}}</td>
                                                <td>{{Form::text('add_annual_income','',['size'=>'9','id'=>'add_annual_income'])}}</td>
                                                <td>{{Form::textarea('add_remarks','',['cols'=>'13','rows'=>'3','id'=>'add_remarks'])}}</td>
                                                <td>{{Form::button('',['class'=>'glyphicon glyphicon-plus-sign alert-success','id'=>'btn_addrow'])}}Add Row</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                        <!-- Movable Table -->
                                    
                                <div class="table-responsive tab-pane fade" id='movable'>
                                    <table class="table table-hover table-striped table-bordered" id="movabletable">
                                        <thead>
                                            <tr id="returnstr">
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
                                            <tr id="returnstr">
                                                <td>{{Form::textarea('add_movable_description','',['cols'=>'20','rows'=>'3','id'=>'add_movable_description'])}}</td>
                                                <td>{{Form::textarea('add_movable_price','',['cols'=>'20','rows'=>'3','id'=>'add_movable_price'])}}</td>
                                                <td>{{Form::textarea('add_movable_in_whose_name','',['cols'=>'20','rows'=>'3','id'=>'add_movable_in_whose_name'])}}</td>
                                                <td>{{Form::textarea('add_movable_how_acquired','',['cols'=>'20','rows'=>'3','id'=>'add_movable_how_acquired'])}}</td>
                                                <td>{{Form::textarea('add_movable_remarks','',['cols'=>'20','rows'=>'3','id'=>'add_movable_remarks'])}}</td>
                                                <td>{{Form::button('',['class'=>'glyphicon glyphicon-plus-sign alert-success','id'=>'btn_movable_addrow'])}}Add Row</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                

                            </div>
                        
                        <!-- OTP -->
                        <div class="form-group {{Input::old('otp') && !$errors->has('otp') ? 'hidden' : ''}}">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="button" onclick="return interactionRequestOTP()" id="interaction_request_otp" class="btn btn-success"><i class="fa fa-key"></i> Generate OTP </button>
                            </div>
                        </div>
                        <div class="form-group hidden" id="otp_info">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="alert alert-info">
                                    <p> ssa </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('otp') ? 'has-error' : Input::old('otp') ? '' : 'hidden interaction-hidden'}}">
                            <label for="otp" class="col-md-4 control-label">One Time Password</label>
                            <div class="col-md-8">
                                <?php 
                                $otpProperties = ['class'=>'form-control'];
                                // if(Input::old('otp') && !$errors->has('otp'))
                                //     $otpProperties['readonly'] = 'readonly';
                                 ?>
                                {{Form::text('otp',Input::old('otp',''),$otpProperties)}}
                                {{$errors->has('otp') ? '<span class="help-block">'.$errors->first('otp').'</span>' : '' }}
                                @if(Input::old('otp') && !$errors->has('otp'))
                                    <p class="text-info "> <?php echo _('The one time password you entered will be used'); ?> </p>
                                @endif
                            </div>
                        </div>
                        {{Form::Submit('Submit',['class'=>'btn btn-primary form-control','style'=>'width:120px;'])}}
                        <div id="hello1">HHH</div>
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
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="../img/icons/cabin.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="../img/icons/cake.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="../img/icons/circus.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
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
                </div>
            </div>
        </div>
    </section>

    @section('extrajs')
    <script language="javascript">
        $(function() {
            $("#officer_name").focus();
            var movRowNum = 0;
            var rowNum = 0;
            function addrow() {
                rowNum++;
                var row = '<tr id="rowNum'+rowNum+'"><td><textarea name="immovable_subdivision[]" cols = "16" rows= "3">'+returns_form.add_subdivision.value+'</textarea></td><td><textarea name="immovable_prop_details[]" cols = "16" rows= "3">'+returns_form.add_prop_details.value+'</textarea></td><td><textarea name="immovable_cost[]" cols = "13" rows= "3">'+returns_form.add_cost.value+'</textarea></td><td><input type="text" name="immovable_present_value[]" value="'+returns_form.add_present_value.value+'" size="9"></td><td><textarea name="immovable_owner[]" cols = "13" rows= "3">'+returns_form.add_owner.value+'</textarea></td><td><textarea name="immovable_how_acquired[]" cols = "13" rows= "3">'+returns_form.add_how_acquired.value+'</textarea></td><td><input type="text" name="immovable_annual_income[]" value="'+returns_form.add_annual_income.value+'" size="9"></td><td><textarea name="immovable_remarks[]" cols = "13" rows= "3">'+returns_form.add_remarks.value+'</textarea></td><td><button class="glyphicon glyphicon-remove-circle alert-danger" onclick="removeRow('+rowNum+')"></button>Remove</td></tr>';
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
                var movRow = '<tr id="movRowNum'+movRowNum+'"><td><textarea name="movable_description[]" cols="20" rows="3">'+returns_form.add_movable_description.value+'</textarea></td><td><textarea name="movable_price[]" cols="20" rows="3">'+returns_form.add_movable_price.value+'</textarea></td><td><textarea name="movable_in_whose_name[]" cols="20" rows="3">'+returns_form.add_movable_in_whose_name.value+'</textarea></td><td><textarea name="movable_how_acquired[]" cols="20" rows="3">'+returns_form.add_movable_how_acquired.value+'</textarea></td><td><textarea name="movable_remarks[]" cols="20" rows="3">'+returns_form.add_movable_remarks.value+'</textarea></td><td><button class="glyphicon glyphicon-remove-circle alert-danger" onclick="removeMovRow('+movRowNum+')"></button>Remove</td></tr>';
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