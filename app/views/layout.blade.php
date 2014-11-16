<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Property Returns</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    {{ HTML::Style('css/bootstrap.css') }}
    <!-- Custom CSS -->
    {{ HTML::Style('css/msegs.css') }}
    <!-- Custom Fonts -->
    {{ HTML::Style('font-awesome-4.1.0/css/font-awesome.min.css') }}
    
<!-- 
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
 -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Property Returns Online</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <li class="page-scroll">
                        <a href="{{ URL::route('users.index')}}">Users</a>
                    </li>
                    <li class="page-scroll">
                        <a href="{{ URL::route('logout')}}" 'class'='btn btn-default'>Logout</a>
                    </li>
                    @else
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Howto</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#view">View</a>
                    </li>
                    <li class="page-scroll">
                        {{Form::open(['route'=>'login','class'=>'navbar-form navbar-right'])}}
                        <div class='form-group'>
                            {{Form::text('username','',['class'=>'form-control form-control-sm','size'=>'10','required'])}}
                            {{Form::password('password',['class'=>'form-control','size'=>'10','required'])}}
                        </div>
                        {{Form::submit('Login',['class'=>'btn btn-default'])}}
                        {{Form::close()}}                
                    </li>
                    @endif
                </ul>
                @if(Session::has('flash_message'))
                    {{ Session::get('flash_message') }}
                @endif
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    
    @yield('container')

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>Mizoram Secretariat<br>Khatla, Aizawl-796001</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <!-- <h3>Around the Web</h3> -->
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Contact Information</h3>
                        <p>Phone:0389-23232323 </p>
                        <p>Email: vigilance@mail.mizoram.gov.in</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Vigilance Department, Government of Mizoram {{date('Y')}}
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    
    <!-- jQuery -->
    {{ HTML::Script('js/jquery.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::Script('js/bootstrap.min.js') }}
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
   
    {{ HTML::Script('js/classie.js') }}
    {{ HTML::Script('js/cbpAnimatedHeader.js') }}
    <!-- Contact Form JavaScript -->
    {{ HTML::Script('js/jqBootstrapValidation.js') }}
    <!-- <script src="js/contact_me.js"></script> -->

    <!-- Custom Theme JavaScript -->
    {{ HTML::Script('js/msegs.js') }}
    @yield('extrajs')

</body>

</html>
