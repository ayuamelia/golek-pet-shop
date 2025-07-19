@extends('layouts.index')

@section('center')

<div class="container">
    @include('alert')
</div>

<section id="cart_items" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="allpetshop">Home</a></li>
                <li class="active">Reservation</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image" style="alignment: center">PETSHOP DESCRIPTION</td>
                    <td class="description" style="alignment: center"></td>
                    <td class="services" style="alignment: center; width: 250px">WHAT SERVICE?</td>
                    <td class="pet_quantity">HOW MANY PET?</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>


                @foreach($reservationItems->items as $item)

                <tr>
                    <td class="cart_product" style="width: 130px; height: 110px; margin-top: 40px">
                        <a href="{{ route('showDetails', ['id' =>$item['data']['id'] ]) }}"><img src="{{Storage::disk('local')->url('petshop_images/'.$item['data']['image'])}}"  width="100" height="100"alt="" style="position: center"></a>
                    </td>
                    <td class="cart_description" style="width: 500px; height: 200px">
                        <h4><a href="{{ route('showDetails', ['id' =>$item['data']['id'] ]) }}">{{$item['data']['name']}}</a></h4><br>
                        <p>{{$item['data']['address']}}, {{$item['data']['city']}}, {{$item['data']['province']}}</p>
                        <p> Phone: {{$item['data']['phone']}}</p>
                        <p> Operational Hour: {{$item['data']['open_time']}} - {{$item['data']['close_time']}}</p>
                        <p style="color: white">{{$item['data']['id']}}</p>
                    </td>

                    <td class="cart_services">
                        @if($item['doctorQuantity'] === 0 && $item['groomingQuantity'] === 0 && $item['hotelQuantity'] === 0)
                        <div class="form-group">
                            <p>
                            <form action="{{ action('PetshopsController@selectPetshop', ['id' =>$item['data']['id'] ]) }}" method="post">
                                <label for="reserve_date">Reservation Date</label><br>
                                <input type="date" name="reserve_date" id="reserve_date" data-provide="datepicker" required><br>

                                <select style="margin-top: 20px; width: 180px" name="selectServices" id="services" >
                                    <option selected disabled>Choose Service</option>

                                    <!--Doctor-->
                                    @if($item['data']['doctor_price'] > 0)
                                    <option value="doctor" id="doctor" ?"selected":"">Doctor - Rp
                                        @php
                                        echo App\Http\Controllers\PetshopsController::separatePrice($item['data']['doctor_price']);
                                        @endphp
                                    </option>
                                    @else
                                    <option disabled>Doctor - Not Available</option>
                                    @endif

                                    <!--Grooming-->
                                    @if($item['data']['grooming_price'] > 0)
                                    <option value="grooming" id="grooming">Grooming - Rp
                                        @php
                                        echo App\Http\Controllers\PetshopsController::separatePrice($item['data']['grooming_price']);
                                        @endphp
                                    </option>
                                    @else
                                    <option disabled>Grooming - Not Available</option>
                                    @endif

                                    <!--Hotel-->
                                    @if($item['data']['hotel_price'] > 0)
                                    <option value="hotel" id="hotel">Hotel - Rp
                                        @php
                                        echo App\Http\Controllers\PetshopsController::separatePrice($item['data']['hotel_price']);
                                        @endphp
                                    </option>
                                    @else
                                    <option disabled>Hotel - Not Available</option>
                                    @endif
                                </select>

                                <select style="margin-top: 20px; width: 180px" name="pet" id="pet" >
                                    <option selected disabled>Choose Pet Type</option>
                                    @if($pet = "Cat")
                                    <option value="Cat" id="Cat">Cat</option>
                                    @else
                                    <option value="Cat" id="Cat" disabled="disabled">Cat</option>
                                    @endif

                                    @if($pet = "Dog")
                                    <option value="Dog" id="Dog">Dog</option>
                                    @else
                                    <option value="Dog" id="Dog" disabled="disabled">Dog</option>
                                    @endif

                                </select>


                            </p>
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                <input class="btn btn-default" type="submit" value="Submit">



                            </form>

                        </div>
                        @else
                        @if($item['doctorQuantity'] > 0 )
                        <h4>Reserve Date</h4>
                        <p>
                            {{$item['reserveDate']}}
                        </p>
                        <h4>Doctor</h4>
                        <p> Rp
                            @php
                            echo App\Http\Controllers\PetshopsController::separatePrice($item['data']['doctor_price']);
                            @endphp
                        </p>
                        <h4>Pet Type</h4>
                        @if($item['pet'] == "Cat")
                        <p>
                            Cat
                        </p>
                        @elseif($item['pet'] == "Dog")
                        <p>
                            Dog
                        </p>
                        @else

                        @endif
                        @endif

                        @if($item['groomingQuantity'] > 0 )
                        <h4>Reserve Date</h4>
                        <p>
                            {{$item['reserveDate']}}
                        </p>
                        <h4>Grooming</h4>
                        <p> Rp
                            @php
                            echo App\Http\Controllers\PetshopsController::separatePrice($item['data']['grooming_price']);
                            @endphp
                        </p>
                        @if($item['pet'] == "Cat")
                        <p>
                            Cat
                        </p>
                        @elseif($item['pet'] == "Dog")
                        <p>
                            Dog
                        </p>
                        @else

                        @endif
                        @endif

                        @if($item['hotelQuantity'] > 0 )
                        <h4>Reserve Date</h4>
                        <p>
                            {{$item['reserveDate']}}
                        </p>
                        <h4>Hotel</h4>
                        <p> Rp
                            @php
                            echo App\Http\Controllers\PetshopsController::separatePrice($item['data']['hotel_price']);
                            @endphp
                        </p>
                        @if($item['pet'] == "Cat")
                        <p>
                            Cat
                        </p>
                        @elseif($item['pet'] == "Dog")
                        <p>
                            Dog
                        </p>
                        @else

                        @endif
                        @endif


                        @endif


                    </td>
                    <td>
                        @if($item['doctorQuantity'] > 0 )
                        <div class="cart_quantity_button" style="width: 120px; height: 20px">
                            <a class="cart_quantity_down" href="{{ route('decreaseQuantity', ['id' =>$item['data']['id'] ]) }}"style="width: 39px; height: 20px"> - </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$item['doctorQuantity']}}" autocomplete="off" max="1" style="width: 39px; height: 20px">
                            <a class="cart_quantity_up" href="{{ route('increaseQuantity', ['id' =>$item['data']['id'] ]) }}" style="width: 39px; height: 20px"> + </a>
                        </div>


                        @endif

                        @if($item['groomingQuantity'] > 0 )
                        <div class="cart_quantity_button" style="width: 120px; height: 20px">
                            <a class="cart_quantity_down" href="{{ route('decreaseQuantity', ['id' =>$item['data']['id'] ]) }}"style="width: 39px; height: 20px"> - </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$item['groomingQuantity']}}" autocomplete="off" max="1" style="width: 39px; height: 20px">
                            <a class="cart_quantity_up" href="{{ route('increaseQuantity', ['id' =>$item['data']['id'] ]) }}" style="width: 39px; height: 20px"> + </a>
                        </div>

                        @endif

                        @if($item['hotelQuantity'] > 0 )
                        <div class="cart_quantity_button" style="width: 120px; height: 20px">
                            <a class="cart_quantity_down" href="{{ route('decreaseQuantity', ['id' =>$item['data']['id'] ]) }}"style="width: 39px; height: 20px"> - </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$item['hotelQuantity']}}" autocomplete="off" max="1" style="width: 39px; height: 20px">
                            <a class="cart_quantity_up" href="{{ route('increaseQuantity', ['id' =>$item['data']['id'] ]) }}" style="width: 39px; height: 20px"> + </a>
                        </div>

                        @endif

                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </div>
</section> <!--/#reservation_items-->

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Quantity<span>{{$reservationItems->totalQuantity}}</span></li>
                        <li>Estimated Price
                            <span>
                                @php
                                    echo App\Http\Controllers\PetshopsController::separatePrice($reservationItems->totalPrice);
                                @endphp
                            </span>
                        </li>
                    </ul>
                    <a class="btn btn-default check_out" href="{{ route('createReservation', ['id' =>$item['data']['id'] ]) }}">Confirm Reservation</a>
                    <a class="btn btn-default check_out" href="{{ route('clear', ['id' =>$item['data']['id'] ]) }}">Reset</a>
                    <a class="btn btn-default check_out" href="{{ route('cancelReservation') }}">Cancel</a>

                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->


@endsection


