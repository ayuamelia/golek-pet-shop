@extends('layouts.admin')

@section('body')

<h2 style="margin-left: 50px; border-style: solid; width: 280px">Confirm Reservation</h2> <br>

<div style="margin-left: 50px">
    <h4 style="border-bottom: solid; width: 180px">Customer Information</h4>
    <table>
        <tr>
            <td style="width: 100px; font-size: 15px">Name</td>
            <td style="font-size: 15px">: {{ $users[0]['name'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Email</td>
            <td style="font-size: 15px">: {{ $users[0]['email'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Phone</td>
            <td style="font-size: 15px">: {{ $users[0]['phone'] }}</td>
        </tr>
    </table>


    <h4 style="border-bottom: solid; width: 150px">Reservation Details</h4>
    <table>
        <tr>
            <td style="width: 100px; font-size: 15px">Status</td>
            <td style="font-size: 15px">: {{$detailReservation->status }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Note</td>
            <td style="font-size: 15px">: {{$detailReservation->note }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Booking Date</td>
            <td style="font-size: 15px">: {{$detailReservation->booking_date }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Service</td>
            <td style="font-size: 15px">: {{ ucfirst($detailReservation->selected_service) }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Pet Type</td>
            <td style="font-size: 15px">: {{$detailReservation->pet_type }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Quantity</td>
            <td style="font-size: 15px">: {{$detailReservation->pet_quantity }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Estimated Price</td>
            <td style="font-size: 15px">: Rp{{ number_format($detailReservation->price) }}
            </td>
        </tr>
    </table><br>

    <form action="/admin/adminAction/{{$detailReservation->id}}" method="post">
        <textarea name="note" rows="5" cols="30" placeholder="Input note here.." style="size: auto; background-color: white"></textarea><br>
        <select name="action" id="action" >
            <option selected disabled>Choose one</option>
            <option value="approved" id="approved" >Approve</option>
            <option value="rejected" id="rejected" >Reject</option>
        </select>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <input class="btn btn-default" type="submit" value="Submit">
    </form>
</div>

@endsection