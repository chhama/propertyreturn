@extends('layout')

@section('container')

<section id="view">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Add User</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <!-- <form name="sentMessage" id="contactForm" novalidate> -->
                {{Form::open(['route'=>'users.store','class'=>''])}}
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Employee ID</label>
                            {{Form::text('emp_id','',['class'=>'form-control','placeholder'=>'Employee ID','id'=>'emp_id','size'=>'10','data-validation-required-message'=>'Please enter Employee ID.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                           	<label>Name</label>
                            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name','id'=>'name','size'=>'10','data-validation-required-message'=>'Please enter Name.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Username</label>
                            {{Form::text('username','',['class'=>'form-control','placeholder'=>'Username','id'=>'username','size'=>'10','data-validation-required-message'=>'Please enter Username.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            {{Form::password('password',['class'=>'form-control','placeholder'=>'Password','id'=>'password','size'=>'10','data-validation-required-message'=>'Please enter Password.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Mobile</label>
                            {{Form::text('mobile','',['class'=>'form-control','placeholder'=>'Mobile','id'=>'mobile','size'=>'10','data-validation-required-message'=>'Please enter Mobile.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Entry Into Service</label>
                            {{Form::text('entry_into_service','',['class'=>'form-control','placeholder'=>'Entry Into Service','id'=>'entry_into_service','size'=>'10','data-validation-required-message'=>'Please enter Entry Into Service.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Superannuation Date</label>
                            {{Form::text('superannuation_date','',['class'=>'form-control','placeholder'=>'Superannuation Date','id'=>'superannuation_date','size'=>'10','data-validation-required-message'=>'Please enter Supperannuation Date.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>User Type</label>
                            {{Form::select('user_type',array('superadmin','admin','employee'),'',['class'=>'form-control','placeholder'=>'User Type','id'=>'user_type','size'=>'10','data-validation-required-message'=>'Please enter User Type.','required'])}}
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
                {{Form::close()}}
                <!-- </form> -->
            </div>
        </div>
    </div>
</section>

@stop