@extends('layouts.admin')

@section('body')

<h2 style="margin-left: 50px; ">Petshop Report</h2>

<div class="table-responsive" style="margin-left: 20px; margin-right: 50px;overflow-x: scroll;">
    <table class="table table-striped" style="border-style: solid">
        <thead style="border-style: solid">
        <tr style="border-style: solid">
            <th style="border-style: solid">Id</th>
            <th style="border-style: solid">Image</th>
            <th style="border-style: solid">Name</th>
            <th style="border-style: solid">Address</th>
            <th style="border-style: solid">Operational Hour</th>
            <th style="border-style: solid">Phone</th>
            <th style="border-style: solid">Doctor</th>
            <th style="border-style: solid">Price</th>
            <th style="border-style: solid">Grooming</th>
            <th style="border-style: solid">Price</th>
            <th style="border-style: solid">Hotel</th>
            <th style="border-style: solid">Price</th>
            <th style="border-style: solid">Last Updated</th>

        </tr>
        </thead>
        <tbody>

        @if(isset($petshop))
        @foreach($petshop as $petshop)
        <tr>
            <td style="border-style: solid">{{$petshop['id']}}</td>
            <td style="border-style: solid"><img src="{{asset ('storage')}}/petshop_images/{{$petshop['image']}}" alt="{{asset ('storage')}}/petshop_images/{{$petshop['image']}}" width="100" height="100" style="max-height:220px" ></td>
            <!-- <td>  <img src="{{ Storage::url('petshop_images/'.$petshop['image'])}}"
                       alt="<?php echo Storage::url($petshop['image']); ?>" width="100" height="100" style="max-height:220px" >   </td> -->
            <td style="border-style: solid">{{$petshop['name']}}</td>
            <td style="border-style: solid">{{$petshop['address']}}, {{$petshop['sub_district']}}, {{$petshop['province']}}</td>
            <td style="border-style: solid">{{$petshop['open_time']}} - {{$petshop['close_time']}}</td>
            <td style="border-style: solid">{{$petshop['phone']}}</td>
            <td style="border-style: solid">{{$petshop['doctor']}}</td>
            <td style="border-style: solid">{{number_format($petshop['doctor_price'])}}</td>
            <td style="border-style: solid">{{$petshop['grooming']}}</td>
            <td style="border-style: solid">{{number_format($petshop['grooming_price'])}}</td>
            <td style="border-style: solid">{{$petshop['hotel']}}</td>
            <td style="border-style: solid">{{number_format($petshop['hotel_price'])}}</td>
            <td style="border-style: solid">{{$petshop['updated_at']}}</td>
        </tr>
        @endforeach

        <h4 align="right">Total Data: {{$petshopCount}}</h4>
        @endif
        </tbody>
    </table>

    @endsection
</div>

