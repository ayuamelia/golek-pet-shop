@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Reservation History</div>

                <div class="panel-body">
                    <table class="table table-striped" style="border-style: solid">
                        <thead style="border-style: solid">
                        <tr style="border-style: solid">
                            <th style="border-style: solid">Status</th>
                            <th style="border-style: solid">Submit Date</th>
                            <th style="border-style: solid">Booking Date</th>
                            <th style="border-style: solid">Petshop Name</th>
                            <th style="border-style: solid">Selected Service</th>
                            <th style="border-style: solid">Pet Type</th>
                            <th style="border-style: solid">Pet Quantity</th>
                            <th style="border-style: solid">Price</th>
                            <th style="border-style: solid">Note</th>

                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($history))
                        @foreach($history as $history)
                        <tr>
                            <td style="border-style: solid">{{$history['status']}}</td>
                            <td style="border-style: solid">{{$history['submit_date']}}</td>
                            <td style="border-style: solid">{{$history['booking_date']}}</td>
                            <td style="border-style: solid">{{$history['petshop_name']}}</td>
                            <td style="border-style: solid">{{$history['selected_service']}}</td>
                            <td style="border-style: solid">{{$history['pet_type']}}</td>
                            <td style="border-style: solid">{{$history['pet_quantity']}}</td>
                            <td style="border-style: solid">{{number_format($history['price'])}}</td>
                            <td style="border-style: solid">{{$history['note']}}</td>
                        </tr>
                        @endforeach

                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection