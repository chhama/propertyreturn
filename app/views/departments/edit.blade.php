
@extends('layout')

@section('container')

<section id="view">
    <div class="container" style="margin-top:20px">
        <div class="col-md-8">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>List Departments</h3>
                    <!-- <hr class="star-primary"> -->
                </div>
            </div>
            <div class="row" >
                
                <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr id='returnstr'>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $slno = 0; ?>
                                @foreach($departmentAll as $department)
                                <tr>
                                    <td align="center" class="col-md-1">{{$index+$slno}}</td>
                                    <td class="col-md-8">{{$department->name}}</td>
                                        {{Form::open(array('url'=>route('departments.destroy', array($department->id)),'method'=>'delete'))}}
                                    <td>
                                            <a href="{{route('departments.edit', array($department->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit department"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
                                    </td>
                                    <td>
                                            <button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove department" value="{{$department->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                        {{Form::close()}}
                                    </td>
                                </tr>
                                <?php $slno++; ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10"> {{ $departmentAll->links() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Edit Department</h3>
                    <!-- <hr class="star-primary"> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <!-- <form name="sentMessage" id="contactForm" novalidate> -->
                    {{ Form::model($departmentById,array('url'=>route('departments.update',$departmentById->id),'method'=>'put','class'=>'')) }}
                        
                        <div class="row control-group">
                            <div class="form-group col-xs-12  controls">
                                <label>Name</label>
                                {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Name','id'=>'name','size'=>'10','data-validation-required-message'=>'Please enter Name.','required'])}}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-md">Update</button>
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