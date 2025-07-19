@extends('layouts.admin')

@section('body')

<h2 style="margin-left: 50px">Rerservation Report</h2>

<div class="table-responsive" style="margin-left: 50px; margin-right: 50px; ">
    <table class="table table-striped" style="border-style: solid">
        <thead style="border-style: solid">
        <tr style="border-style: solid">
            <th style="border-style: solid">Id</th>
            <th style="border-style: solid">User ID</th>
            <th style="border-style: solid">Submit Date</th>
            <th style="border-style: solid">Booking Date</th>
            <th style="border-style: solid">Status</th>
            <th style="border-style: solid">Petshop Name</th>
            <th style="border-style: solid">Selected Service</th>
            <th style="border-style: solid">Pet Type</th>
            <th style="border-style: solid">Pet Quantity</th>
            <th style="border-style: solid">Price</th>
            <th style="border-style: solid">Note</th>
            <th style="border-style: solid">Last Updated</th>

        </tr>
        </thead>
        <tbody>

        @if(isset($reservation))
        @foreach($reservation as $reservation)
        <tr>
            <td style="border-style: solid">{{$reservation['id']}}</td>
            <td style="border-style: solid">{{$reservation['user_id']}}</td>
            <td style="border-style: solid">{{$reservation['submit_date']}}</td>
            <td style="border-style: solid">{{$reservation['booking_date']}}</td>
            <td style="border-style: solid">{{$reservation['status']}}</td>
            <td style="border-style: solid">{{$reservation['petshop_name']}}</td>
            <td style="border-style: solid">{{$reservation['selected_service']}}</td>
            <td style="border-style: solid">{{$reservation['pet_type']}}</td>
            <td style="border-style: solid">{{$reservation['pet_quantity']}}</td>
            <td style="border-style: solid">{{number_format($reservation['price'])}}</td>
            <td style="border-style: solid">{{$reservation['note']}}</td>
            <td style="border-style: solid">{{$reservation['updated_at']}}</td>
        </tr>
        @endforeach

        <h4 align="right">Total Data: {{$reservationCount}}</h4>
        @endif
        </tbody>
    </table>

    @endsection
</div>

