@extends('layout')

@section('container')

<section id="view">
        <div class="container" style="margin-top:20px">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>List Users</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-8 col-lg-offset-2">
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
        </div>
    </section>

@stop