@extends('layouts.admin')

@section('body')

<h2 style="margin-left: 50px">Petshop Data</h2>

<div class="table-responsive" style="margin-left: 50px; margin-right: 50px">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Address</th>
            <th>Operational Hour</th>
            <th>Phone</th>
            <th>Doctor</th>
            <th>Grooming</th>
            <th>Hotel</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>

        @foreach($petshops as $petshop)
        <tr>
            <td>{{$petshop['id']}}</td>
            <td><img src="{{asset ('storage')}}/petshop_images/{{$petshop['image']}}" alt="{{asset ('storage')}}/petshop_images/{{$petshop['image']}}" width="100" height="100" style="max-height:220px" ></td>
            <!-- <td>  <img src="{{ Storage::url('petshop_images/'.$petshop['image'])}}"
                       alt="<?php echo Storage::url($petshop['image']); ?>" width="100" height="100" style="max-height:220px" >   </td> -->
            <td>{{$petshop['name']}}</td>
            <td>{{$petshop['address']}}, {{$petshop['sub_district']}}, {{$petshop['province']}}</td>
            <td>{{$petshop['open_time']}} - {{$petshop['close_time']}}</td>
            <td>{{$petshop['phone']}}</td>
            <td>{{$petshop['doctor']}}</td>
            <td>{{$petshop['grooming']}}</td>
            <td>{{$petshop['hotel']}}</td>
            <td><a href="{{ route('adminEditPetshopForm', ['id' =>$petshop['id'] ]) }}" class="btn btn-primary">Edit</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @endsection
</div>

