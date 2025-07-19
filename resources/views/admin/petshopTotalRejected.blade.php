@extends('layouts.admin')

@section('body')

<h2 style="margin-left: 50px">Reservation List</h2>

<div class="table-responsive" style="margin-left: 50px; margin-right: 50px">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Submit Date</th>
            <th>Booking</th>
            <th>Service</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
            <th>Last Update</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($reservation as $reservation)
        <tr>
            <td>{{$reservation['id']}}</td>
            <td>{{$reservation['submit_date']}}</td>
            <td>{{$reservation['booking_date']}}</td>
            <td>{{$reservation['selected_service']}}</td>
            <td>{{$reservation['pet_quantity']}}</td>
            <td>
                @php
                echo App\Http\Controllers\PetshopsController::separatePrice($reservation['price']);
                @endphp
            </td>
            <td>{{$reservation['status']}}</td>
            <td>{{$reservation['updated_at']}}</td>
            <td>
                <a class="btn btn-default" style="background: darkcyan; color: white" href="{{route('detailReservationData', ['id'=>$reservation['id']]) }}">Detail Reservation</a>

            </td>
        </tr>

        @endforeach
        </tbody>
    </table>
    @endsection
</div>

