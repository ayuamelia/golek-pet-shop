@extends('layouts.index')

@section('center')
<!DOCTYPE html>
<html lang="en">

@if(isset($detailPetshop))
<div class="container">
    <div class="petshop-detail">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" role="presentation" >
                <a href="{{route('allpetshop')}}" class="router-link-active" target="_self">Home</a></li>
            <li role="presentation" class="breadcrumb-item active">
                <span aria-current="location">{{$detailPetshop->name}}</span></li></ol>

        <div class="row">
            <div class="col-sm-9">
                <div class="data">
                    <div class="image">
                        <img alt="{{$detailPetshop->name}}" class="img-responsive fit-image" src="{{Storage::disk('local')->url('petshop_images/'.$detailPetshop->image)}}" lazy="loaded" height="450px" width="450px">
                    </div>
                    <div class="content">
                        <h3 class="title">{{$detailPetshop->name}}</h3>
                        <div class="row mt-3 meta">
                            <div class="col-md-6 col-6 order-1">
                                <img src="{{asset('img/place.png')}}" height="25" width="25"> {{$detailPetshop->address}}, {{$detailPetshop->sub_district}}, {{$detailPetshop->city}}, {{$detailPetshop->province}} <br><br>
                                <img src="{{asset('img/phone.png')}}" height="25" width="25"> {{$detailPetshop->phone}}<br><br>
                                <img src="{{asset('img/time.png')}}" height="25" width="25"> {{$detailPetshop->open_time}} - {{$detailPetshop->close_time}}
                            </div>
                            <div class="col-md-4 order-md-2 col-6 order-2">
                                <img src="{{asset('img/cost.png')}}" height="25" width="25"> Estimated Price <br><br>

                                @if($detailPetshop->doctor_price > 0)
                                <img src="{{asset('img/doctor.png')}}" height="25" width="45" style="padding-left: 20px"> Doctor - Rp
                                @php
                                echo App\Http\Controllers\PetshopsController::separatePrice($detailPetshop->doctor_price);
                                @endphp
                                <br><br>
                                @else
                                <img src="{{asset('img/doctor.png')}}" height="25" width="45" style="padding-left: 20px"> Doctor - Not Available<br><br>
                                @endif

                                @if($detailPetshop->grooming_price > 0)
                                <img src="{{asset('img/grooming.png')}}" height="25" width="45" style="padding-left: 20px"> Grooming - Rp
                                @php
                                echo App\Http\Controllers\PetshopsController::separatePrice($detailPetshop->grooming_price);
                                @endphp
                                <br><br>
                                @else
                                <img src="{{asset('img/grooming.png')}}" height="25" width="45" style="padding-left: 20px"> Grooming - Not Available<br><br>
                                @endif

                                @if($detailPetshop->hotel_price > 0)
                                <img src="{{asset('img/hotel.png')}}" height="25" width="45" style="padding-left: 20px"> Hotel - Rp
                                @php
                                echo App\Http\Controllers\PetshopsController::separatePrice($detailPetshop->hotel_price);
                                @endphp
                                <br><br>
                                @else
                                <img src="{{asset('img/hotel.png')}}" height="25" width="45" style="padding-left: 20px"> Hotel - Not Available<br><br>
                                @endif

                                <!--<form action="/admin/createReservation/{{$detailPetshop->id}}" method="post">
                                    {{csrf_field()}}
                                    <select name="service" id="service">
                                        <option value="0">Doctor</option>
                                        <option value="1">Grooming</option>
                                        <option value="2">Hotel</option>
                                    </select>

                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                </form>-->
                                <a href="{{route('MakeReservationPetshop', ['id'=>$detailPetshop->id])}}" class="btn btn-default check_out" style="margin: auto; display: block">Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" style="background-color:#f5f8fa">
                <div class="card more-info">
                    <div class="card-body">
                        <h3 class="font-weight-bold">More Info</h3><br>
                        <div class="row">
                            <div class="mt-5 col-lg-8 col-8">
                                <img alt="Accessories" src="{{asset('img/accessories-on.png')}}" lazy="loaded" height="30" width="30">
                                Accessories <br><br>
                                <img alt="Accessories" src="{{asset('img/food-on.png')}}" lazy="loaded" height="30" width="30">
                                Food
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<br><br>


<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script>

</script>

</html>

@endsection