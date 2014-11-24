@extends('layout')

@section('container')

<section id="view">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Change Password</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <!-- <form name="sentMessage" id="contactForm" novalidate> -->
                {{ Form::model($userById,array('url'=>route('users.updatepassword',$userById->id),'method'=>'put','class'=>'')) }}
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                           	<label>Current Password</label>
                            {{Form::password('currentpassword',['class'=>'form-control','placeholder'=>'Current Password','id'=>'currentpassword','size'=>'10','data-validation-required-message'=>'Please enter Current Password.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                            <label>New Password</label>
                            {{Form::password('password',['class'=>'form-control','placeholder'=>'New Password','id'=>'newpassword','size'=>'10','data-validation-required-message'=>'Please enter New Password.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                            <label>Confirm New Password</label>
                            {{Form::password('password_confirm',['class'=>'form-control','placeholder'=>'Confirm New Password','id'=>'newpassword','size'=>'10','data-validation-required-message'=>'Please enter Confirm New Password.','required'])}}
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