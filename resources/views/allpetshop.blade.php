@extends('layouts.index')

@section('center')

<div class="container">
    @include('alert')
</div>
<!--slider-->
<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-11">
                                <img src="{{asset('images/home/masthead.jpg')}}" class="masthead img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-11">
                                <img src="{{asset('images/home/masthead.jpg')}}" class="masthead img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-11">
                                <img src="{{asset('images/home/masthead.jpg')}}" class="masthead img-responsive" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Advanced Search</h2>
                    <!--Advanced Search-->
                    <div class="panel-group category-products" id="accordian">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#services">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Services
                                    </a>
                                </h4>
                            </div>
                            <div id="services" class="panel-collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="{{route('advancedAll')}}" name="allservices" >All Services </a></li>
                                        <li><a href="{{route('advancedGrooming')}}" name="grooming">Grooming </a></li>
                                        <li><a href="{{route('advancedHotel')}}" name="hotel">Hotel </a></li>
                                        <li><a href="{{route('advancedDoctor')}}" name="doctor">Doctor</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Advanced Search-->


                </div>
            </div>
            @if(isset($details))
            <div class="col-sm-9 padding-right">
                <!--Search Result-->
                <div class="features_items">
                    <h2 class="title text-center">Search Result </h2>
                    @foreach($details as $petshop)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products" style="height: 350px">
                                <div class="productinfo text-center">
                                    <img src="{{Storage::disk('local')->url('petshop_images/'.$petshop->image)}}" alt="" height="200" width="180"/>
                                    <h2 style="height: 50px">{{$petshop->name}}</h2>
                                    <p>{{$petshop->address}}, {{$petshop->district}} {{$petshop->city}}, {{$petshop->province}}</p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <!--<h3>Details</h3>-->
                                        <h4 style="color: white">Open {{$petshop->open_time}} - {{$petshop->close_time}}</h4>
                                        <p>Phone: {{$petshop->phone}}</p>
                                        <!--<h3>Average Cost</h3>
                                        <p>Grooming: Rp 120.000,-</p>
                                        <p>Hotel: Rp 60.000,-/day</p>{{$details->links()}}
                                        <p>Doctor: Rp 500.000,-</p>-->
                                        <a href="{{route('showDetails', ['id'=>$petshop->id])}}" class="btn btn-default add-to-cart">More Info</a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('MakeReservationPetshop', ['id'=>$petshop->id])}}" class="btn-default btn add-to-cart" style="margin: auto; display: block">Reservation</a>
                        </div>
                    </div>
                    @endforeach

                    {{$details->links()}}

                </div>
                <!--Search Result-->


            </div>
            @endif
            <div class="features_items">
                <h2 class="title text-center">Search Result</h2>
                <h3 style="alignment: center">No Details found. Please try to search again.</h3>
            </div>
        </div>
    </div>
</section>


@endsection