
@extends('layout')

@section('container')

<section id="view">
    <div class="container" style="margin-top:20px">
        <div class="col-md-8">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>List Users</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row" >
                
                <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr id='returnstr'>
                                    <th class="proptd">#</th>
                                    <th class="proptd">Employee ID</th>
                                    <th class="proptd">Name</th>
                                    <th class="proptd">Username</th>
                                    <th class="proptd">Mobile</th>
                                    <th class="proptd">Entry Into Service</th>
                                    <th class="proptd">Superannuation Date</th>
                                    <th class="proptd">User Type</th>
                                    <th class="proptd">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $slno = 0; ?>
                                @foreach($userAll as $user)
                                <tr>
                                    <td class="proptd">{{$index+$slno}}</td>
                                    <td class="proptd">{{$user->emp_id}}</td>
                                    <td class="proptd">{{$user->name}}</td>
                                    <td class="proptd">{{$user->username}}</td>
                                    <td class="proptd">{{$user->mobile}}</td>
                                    <td class="proptd">{{$user->entry_into_service}}</td>
                                    <td class="proptd">{{$user->superannuation_date}}</td>
                                    <td class="proptd">{{$user->user_type}}</td>
                                    <td class="proptd">
                                        {{Form::open(array('url'=>route('users.destroy', array($user->id)),'method'=>'delete'))}}
                                            <a href="{{route('users.edit', array($user->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit User"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
                                            <button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove User" value="{{$user->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                        {{Form::close()}}
                                    </td>
                                </tr>
                                <?php $slno++; ?>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Edit User</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <!-- <form name="sentMessage" id="contactForm" novalidate> -->
                    {{ Form::model($userById,array('url'=>route('users.update',$userById->id),'method'=>'put','class'=>'')) }}
                        <div class="row control-group">
                            <div class="form-group col-xs-12  controls">
                                <label>User Type</label>
                                {{Form::select('user_type',array('superadmin'=>'superadmin','admin'=>'admin','employee'=>'employee'),$userById->user_type,['class'=>'form-control','placeholder'=>'User Type','id'=>'user_type','data-validation-required-message'=>'Please enter User Type.','required'])}}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
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
                                {{Form::text('username',null,['class'=>'form-control','placeholder'=>'Username','id'=>'username','size'=>'10','data-validation-required-message'=>'Please enter Username.','readonly'])}}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12  controls">
                                <label>Mobile</label>
                                {{Form::text('mobile',null,['class'=>'form-control','placeholder'=>'Mobile','id'=>'mobile','size'=>'10','data-validation-required-message'=>'Please enter Mobile.','required'])}}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12  controls">
                                <label>Entry Into Service</label>
                                {{Form::text('entry_into_service',null,['class'=>'form-control','placeholder'=>'Entry Into Service','id'=>'entry_into_service','size'=>'10','data-validation-required-message'=>'Please enter Entry Into Service.','required'])}}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12  controls">
                                <label>Superannuation Date</label>
                                {{Form::text('superannuation_date',null,['class'=>'form-control','placeholder'=>'Superannuation Date','id'=>'superannuation_date','size'=>'10','data-validation-required-message'=>'Please enter Supperannuation Date.','required'])}}
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
    </div>
</section>

@stop