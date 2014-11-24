@extends('layout')

@section('container')

<section id="view">
    <div class="container">
        <div class="row createuser-row">
            <div class="col-lg-12 text-center">
                <h3>Edit Profile</h3>
                <!-- <hr class="star-primary"> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <!-- <form name="sentMessage" id="contactForm" novalidate> -->
                {{ Form::model($userById,array('url'=>route('users.updateprofile',$userById->id),'method'=>'put','class'=>'')) }}
                    <div class="row control-group">
                        <div class="form-group col-xs-12 controls">
                            <label>Employee ID</label>
                            {{Form::text('emp_id',null,['class'=>'form-control','placeholder'=>'Employee ID','id'=>'emp_id','size'=>'10','data-validation-required-message'=>'Please enter Employee ID.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                            <label>Name</label>
                            {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Name','id'=>'name','size'=>'10','data-validation-required-message'=>'Please enter Name.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                            <label>Username</label>
                            {{Form::text('username',null,['class'=>'form-control','placeholder'=>'Username','id'=>'username','size'=>'10','data-validation-required-message'=>'Please enter Name.','readonly'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 controls">
                            <label>Password</label>
                            {{Form::password('password',['class'=>'form-control','placeholder'=>'Password','id'=>'password','size'=>'10','data-validation-required-message'=>'Please enter Password.'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                            <label>Mobile</label>
                            {{Form::text('mobile',null,['class'=>'form-control','placeholder'=>'Mobile','id'=>'mobile','size'=>'10','data-validation-required-message'=>'Please enter Mobile.','maxlength'=>'10','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                            <label>Entry Into Service</label>
                            <div class="input-group">
                                {{Form::text('entry_into_service',null,['class'=>'form-control','placeholder'=>'Entry Into Service','id'=>'datetimepicker1','size'=>'10','data-validation-required-message'=>'Please enter Entry Into Service.','required'])}}
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                            <label>Superannuation Date</label>
                            <div class="input-group">
                                {{Form::text('superannuation_date',null,['class'=>'form-control','placeholder'=>'Superannuation Date','id'=>'datetimepicker2','size'=>'10','data-validation-required-message'=>'Please enter Supperannuation Date.','required'])}}
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-md">Update Profile</button>
                        </div>
                    </div>
                {{Form::close()}}
                <!-- </form> -->
            </div>
        </div>
    </div>
</section>

<script>
    $('#datetimepicker1').datetimepicker({
        step: 5
    });

    $('#datetimepicker2').datetimepicker({
        step: 5
    });
</script>
@stop