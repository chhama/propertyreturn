@extends('layout')



@section('container')
    <!-- Header -->
    <header class="form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="formheader">Immovable Property</span>
                        <!-- <hr class="star-light"> -->
                        {{Form::open()}}
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr id='returnstr'>
                                        <th class="proptd">Name of Dist. Sub.Division Taluk and Village in which property is situated (Full location and postal address)</th>
                                        <th class="proptd">Name & Details of properties (in case of land, area & pass no. & date/but in case of buildings, type of building with specification to be indicated)</th>
                                        <th class="proptd">Cost of acquirement of land with date/cost of the building constn. with date of starting the work and date of completion.</th>
                                        <th class="proptd">Present Value</th>
                                        <th class="proptd">Name of Owner. If not in own name, state in whose name held and his/her relationship to the Govt. Servant</th>
                                        <th class="proptd">How acquired whether by purchase, lease, mortgate, inheritance, gift or otherwise, and eate of acquisition & name with details of person(s) from whom acquired.</th>
                                        <th class="proptd">Annual income from the property</th>
                                        <th class="proptd">Remarks</th>
                                        <th class="proptd">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'20','rows'=>'3'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'20','rows'=>'3'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'15','rows'=>'3'])}}</td>
                                        <td class="proptd">{{Form::text('subdivision','',['size'=>'15'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'15','rows'=>'4'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'15','rows'=>'4'])}}</td>
                                        <td class="proptd">{{Form::text('subdivision','',['size'=>'15'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'15','rows'=>'3'])}}</td>
                                        <td class="proptd">{{Form::button('',['class'=>'glyphicon glyphicon-plus alert-success','id'=>'btn_addrow'])}}Add</td>
                                    </tr>
                                <!--     <tr>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'20','rows'=>'3'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'20','rows'=>'6'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'15','rows'=>'6'])}}</td>
                                        <td class="proptd">{{Form::text('subdivision','',['size'=>'15'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'15','rows'=>'6'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'15','rows'=>'6'])}}</td>
                                        <td class="proptd">{{Form::text('subdivision','',['size'=>'15'])}}</td>
                                        <td class="proptd">{{Form::textarea('subdivision','',['cols'=>'15','rows'=>'6'])}}</td>

                                    </tr> -->

                                </tbody>
                            </table>
                            {{Form::button('Submit',['class'=>'btn btn-success form-control'])}}
                            </div>
                        {{Form::close()}}
                    </div>
                </div>

            </div>
             Note 1. <br>
                In this form, information may be given regarding items like  
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
            $("#btn_addrow").click(function() {
                alert('all');
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