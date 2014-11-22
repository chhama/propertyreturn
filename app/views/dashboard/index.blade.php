@extends('layout')

@section('container')

    <!-- Header -->
    <header class="form">
        <div class="container">
            <div class="row">
            <h2>Dashboard</h2>
                <div class="col-lg-12">
                <div class="panel panel-default stat-panel  my-chart ct-perfect-fourth">
                    <div class="panel-heading">
                        Total returns filed for the month of {{date('F')}}, {{date('Y')}}
                    </div>
                    <div class="panel-body">
                        @include('stats.infograph')
                    </div>
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
                    <!-- <h2>header</h2>
                    <hr class="star-primary"> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                <div class="panel panel-default stat-panel">
                    <div class="panel-heading">
                        Officers yet to file their returns
                    </div>
                    <div class="panel-body">
                        @include('stats.pending-returns')
                    </div>
                </div>
                </div>

                <div class="col-lg-3">
                    <!-- <div class="panel panel-default">
                        <div class="panel-body">
                      -->
                             @include('stats.statcounts')
                      <!--   </div>
                    </div> -->  
                </div>
            </div>
        </div>
    </section>






@stop


  