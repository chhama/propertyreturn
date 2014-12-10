@extends('layout')

@section('container')

<section id="view">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Forgot Password</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <!-- <form name="sentMessage" id="contactForm" novalidate> -->
                {{Form::open(['route'=>'submitforgot','class'=>''])}}
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                           	<label>Username</label>
                            {{Form::text('username','',['class'=>'form-control','placeholder'=>'Username','id'=>'username','size'=>'10','data-validation-required-message'=>'Please enter Username.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12  controls">
                            <label>Registered Mobile No</label>
                            {{Form::text('mobile','',['class'=>'form-control','placeholder'=>'Mobile No','id'=>'mobile','size'=>'10','data-validation-required-message'=>'Please enter Registered Phone No.','required'])}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Reset Password</button>
                        </div>
                    </div>
                {{Form::close()}}
                <!-- </form> -->
            </div>
        </div>
    </div>
</section>

@stop