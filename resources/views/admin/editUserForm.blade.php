@extends('layouts.admin')

@section('body')

<div class="table-responsive" style="margin-left: 50px; margin-right: 50px">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>

            <li>{!! print_r($errors->all()) !!}</li>

        </ul>
    </div>
    @endif



    <h3>Current Image</h3>
    <div><img src="{{asset ('storage')}}/petshop_images/{{$petshop['image']}}" width="100" height="100" style="max-height:220px" ></div>

    <form action="/admin/updatePetshopImage/{{$petshop->id}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}



        <div class="form-group">
            <label for="description">Update Image</label>
            <input type="file" class=""  name="image" id="image" placeholder="Image" value="{{$petshop->image}}" required>
        </div>

        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div> <br><br>

<div class="table-responsive" style="width: 500px; margin-left: 50px">

    <form action="/admin/updatePetshop/{{$petshop->id}}" method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="{{$petshop->name}}" required>
        </div>

        <div class="form-group">
            <label for="description">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{$petshop->address}}" required>
        </div>
        <div class="form-group">
            <label for="description">Sub District</label>
            <input type="text" class="form-control" name="sub_district" id="sub_district" placeholder="Sub District" value="{{$petshop->sub_district}}" required>
        </div>
        <div class="form-group">
            <label for="description">City</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City" value="{{$petshop->city}}" required>
        </div>
        <div class="form-group">
            <label for="description">Province</label>
            <input type="text" class="form-control" name="province" id="province" placeholder="Province" value="{{$petshop->province}}" required>
        </div>

        <div class="form-group">
            <label for="type">Time open - close</label>
            <input type="time" class="form-control" name="open_time" id="close_time" placeholder="" value="{{$petshop->open_time}}" required>
            <input type="time" class="form-control" name="close_time" id="close_time" placeholder="" value="{{$petshop->close_time}}" required>
        </div>

        <div class="form-group">
            <label for="type">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{$petshop->phone}}" required>
        </div>

        <div class="form-group">
            <label for="type">Doctor</label>
            <!--<input type="text" class="form-control" name="doctor" id="doctor" placeholder="Doctor" value="{{$petshop->doctor}}" required>-->
            <p>
                <select name="doctor" id="doctor">
                    <option value="yes"<?php if ($petshop->doctor === 'yes') echo ' selected="selected"'?>>yes</option>
                    <option value="no"<?php if ($petshop->doctor === 'no') echo ' selected="selected"'?>>no</option>
                </select>
            </p>
        </div>
        <div class="form-group">
            <label for="type">Price</label>
            <input type="number" lang="en" class="form-control" name="doctor_price" id="doctor_price" placeholder="Doctor Price" value="{{$petshop->doctor_price}}" required>
        </div>

        <div class="form-group">
            <label for="type">Grooming</label>
            <p>
                <select name="grooming" id="grooming">
                    <option value="yes"<?php if ($petshop->grooming === 'yes') echo ' selected="selected"'?>>yes</option>
                    <option value="no"<?php if ($petshop->grooming === 'no') echo ' selected="selected"'?>>no</option>
                </select>
            </p>
        </div>
        <div class="form-group">
            <label for="type">Price</label>
            <input type="number" class="form-control" name="grooming_price" id="grooming_price" placeholder="Grooming Price" value="{{$petshop->grooming_price}}" required>
        </div>

        <div class="form-group">
            <label for="type">Hotel</label>
            <p>
                <select name="hotel" id="hotel">
                    <option value="yes"<?php if ($petshop->hotel === 'yes') echo ' selected="selected"'?>>yes</option>
                    <option value="no"<?php if ($petshop->hotel === 'no') echo ' selected="selected"'?>>no</option>
                </select>
            </p>
        </div>
        <div class="form-group">
            <label for="type">Price</label>
            <input type="number" class="form-control" name="hotel_price" id="hotel_price" placeholder="Hotel Price" value="{{$petshop->hotel_price}}" required>
        </div>

        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection