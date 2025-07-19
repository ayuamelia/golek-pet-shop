@extends('layouts.index')

@section('center')


<section>
    <div class="container">
        <div class="row">

            <h2 class="title text-center">Grooming</h2>

            @if(isset($details))
            <div class="col-sm-10 padding-right" style="margin-left: 100px">
                <!--Search Result-->
                <div class="features_items">
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
                                        <p>Hotel: Rp 60.000,-/day</p>
                                        <p>Doctor: Rp 500.000,-</p>-->
                                        <a href="{{route('showDetails', ['id'=>$petshop->id])}}" class="btn btn-default add-to-cart">More Info</a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('MakeReservationPetshop', ['id'=>$petshop->id])}}" class="btn-default btn add-to-cart" style="margin: auto; display: block">Reservation</a>
                        </div>

                    </div>
                    @endforeach
                </div>
                <!--Search Result-->
                {{$details->links()}}

            </div>
            @endif

        </div>
    </div>
</section>

@endsection