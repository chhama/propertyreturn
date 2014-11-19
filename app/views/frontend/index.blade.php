@extends('layout')

@section('container')

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" style="height:220px;" src="img/emblem.png" alt="">
                    <div class="intro-text">
                        <span class="name">Vigilance Department</span>
                        <hr class="star-light">
                        <span class="skills">Government of Mizoram</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- View Returns Section -->
    <section id="view">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>View Property Returns Statement</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <!-- <form name="sentMessage" id="contactForm" novalidate> -->

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
                        
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg" id="btn_get_returns">View</button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </section>

    <a href="#returnsmodal" data-toggle="modal" id="returnshref"></a>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="success">
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
                        <img src="img/icons/cabin.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/icons/cake.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/icons/circus.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/icons/game.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/icons/safe.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/icons/submarine.png" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- About Section -->
    <section class="success" id="about">
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
    </section>

    
    <!-- Returns Modal -->


 <div class="portfolio-modal modal fade scrollable dismissible" id="returnsmodal" role="dialog"  aria-hidden="false">
        <div class="modal-content" id="content-modal">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <div id="singlereturns"></div>
                            <div id="single_movable"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- 
<div class="modal fade" id="returnsmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div id="singlereturns"></div>
                            <div id="single_movable"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

@stop


    @section('extrajs')
        <script language="javascript">
        $(function(){
            console.log("welcome to msegs");
        });

            $('#btn_get_returns').click(function(){
                console.log('ll');
                $.ajax({
                    type: 'get',
                    data: 'user_id='+$("#name").val(),
                    url: 'getreturns',
                    datatype: 'json',
                }).success(function(officer){
                        var immovable = JSON.parse(officer.immovable_property);
                        var movable = JSON.parse(officer.movable_property);
                        // var pit = {immovable_property: "{"immovable_subdivision":["a","b","c","d"],"immovable_prop_details":["a","b ","c","d"],"immovable_cost":["a","b","c","d"],"immovable_present_value":["a","b","c","d"],"immovable_owner":["a","b","c","d"],"immovable_how_acquired":["a","b","c","d"],"immovable_annual_income":["a","b","c","d"],"immovable_remarks":["a","b","c","d"],"add_subdivision":"e","add_prop_details":"e","add_cost":"e","add_present_value":"e","add_owner":"e","add_how_acquired":"e","add_annual_income":"e","add_remarks":"e "}"};
                        // document.write(movable.movable_description[0]);
                        // document.write(immovable.immovable_subdivision[1]);
                        console.log(officer);
                    if(officer) {
                        
                    var immovable_row =   '<div class="panel panel-default col-lg-12">'
                                    +'<div class="panel-heading">Property Returns Record'
                                    +'</div>'
                                    +'<div class="panel-body">'
                                    +'<table class="table table-hover table-striped table-bordered">'
                                    +'<tr><td>Service</td><td>'+officer.service+'</td></tr>'
                                    +'<tr><td>Present Place of Posting</td><td>'+officer.present_place_of_posting+'</td></tr>'
                                    +'<tr><td>Basic Pay</td><td>'+officer.basic_pay+'</td></tr>'
                                    +'<tr><td>Present Post</td><td>'+officer.present_post+'</td></tr>'
                                    +'<tr><td>Pay Band and Grade Pay</td><td>'+officer.pay_band_and_grade_pay+'</td></tr>'
                                    +'<tr><td>Present Enolument</td><td>'+officer.present_enolument+'</td></tr></table>'
                                    +'<h3>Immovable Property</h3>'
                                    +'<table class="table table-hover table-striped table-bordered">'
                                    +'<thead><tr><th>Name of Dist. Sub.Division Taluk and Village in which property is situated (Full location and postal address)</th>'
                                    +'<th>Name & Details of properties (in case of land, area & pass no. & date/but in case of buildings, type of building with specification to be indicated)</th>'
                                    +'<th>Cost of acquirement of land with date/cost of the building constn. with date of starting the work and date of completion.</th>'
                                    +'<th>Present Value</th>'
                                    +'<th>Name of Owner. If not in own name, state in whose name held and his/her relationship to the Govt. Servant</th>'
                                    +'<th>How acquired whether by purchase, lease**, mortgate, inheritance, gift or otherwise, and eate of acquisition & name with details of person(s) from whom acquired.</th>'
                                    +'<th>Annual income from the property</th>'
                                    +'<th>Remarks</th></tr></thead>'
                                    +'<tbody>'    
                    if(immovable){
                        if(immovable.immovable_subdivision != undefined) {
                            var len = immovable.immovable_subdivision.length;
                            for(var i=0;i<len;i++){
                                immovable_row += "<tr><td>"+immovable.immovable_subdivision[i]+"</td><td>"+immovable.immovable_prop_details[i]+"</td><td>"+immovable.immovable_cost[i]+"</td><td>"+immovable.immovable_present_value[i]+"</td><td>"
                                +immovable.immovable_owner[i]+"</td><td>"+immovable.immovable_how_acquired[i]+"</td><td>"+immovable.immovable_annual_income[i]+"</td><td>"+immovable.immovable_remarks[i]+"</td></tr>";
                       
                            }
                        }
                    }
                    
                    // document.write(immovable_row);
                }

              
                if(immovable) {
                    if(immovable.add_subdivision) {
                        immovable_row += "<tr><td>"+immovable.add_subdivision+"</td><td>"+immovable.add_prop_details+"</td><td>"+immovable.add_cost+"</td><td>"+immovable.add_present_value+"</td><td>"
                        +immovable.add_owner+"</td><td>"+immovable.add_how_acquired+"</td><td>"+immovable.add_annual_income+"</td><td>"+immovable.add_remarks+"</td></tr>";
                        }
                   }

                    var movable_row ='</tbody></table><h3>Movable Property</h3>'
                    +'<table class="table table-hover table-striped table-bordered">'
                    +'<thead><tr><th>Description of items</th>'
                    +'<th>Price of value at the time of acquisition and or the total payments up to the date of return, as the case may be, in case of articles purchased/on hire purchase or instalments basis.</th>'
                    +'<th>If not own name & address of the person in whose name & his/her relationship with the Govt. servant. </th>'
                    +'<th>How acquired. Approximate date of acquisition</th>'
                    +'<th>Remarks</th>'
                    +'</tr></thead><tbody>'
                    
                    
                    if(movable) {
                        if(movable.movable_description != undefined) {
                            var movlen = movable.movable_description.length;
                            for(var i=0;i<movlen;i++) {
                                movable_row += "<tr><td>"+movable.movable_description[i]+"</td><td>"+movable.movable_price[i]+"</td><td>"+movable.movable_in_whose_name[i]+"</td><td>"
                                +movable.movable_how_acquired[i]+"</td><td>"+movable.movable_remarks[i]+"</td></tr>"
                        }
                    }
                        if(movable.add_movable_description != undefined) {
                            movable_row += "<tr><td>"+movable.add_movable_description+"</td><td>"+movable.add_movable_price+"</td><td>"+movable.add_movable_in_whose_name+"</td><td>"
                            +movable.add_movable_how_acquired+"</td><td>"+movable.add_movable_remarks+"</td></tr>"
                        }
                    }



                    movable_row += '</tbody></table></div></div>';



                    $("#singlereturns").html(immovable_row);
                    $("#single_movable").html(movable_row);
                    $("#returnshref").click();
                    $("#content-modal").prev().removeClass("modal-backdrop");
                    // console.log(data.immovable_property);
                });
            });
        </script>
    @stop