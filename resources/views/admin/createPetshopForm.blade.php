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


    <h2>Create New Petshop</h2>

    <form action="/admin/sendNewPetshopForm" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class=""  name="image" id="image" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Petshop Name" required>
        </div>
        <div class="form-group">
            <label for="description">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
        </div>
        <div class="form-group">
            <label for="description">Sub District</label>
            <input type="text" class="form-control" name="sub_district" id="sub_district" placeholder="Sub District" required>
        </div>
        <div class="form-group">
            <label for="description">City</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
        </div>
        <div class="form-group">
            <label for="description">Province</label>
            <input type="text" class="form-control" name="province" id="province" placeholder="Province" required>
        </div>


        <div class="form-group">
            <label for="type">Operational Hour</label>
            <input type="time" class="form-control" name="open_time" id="close_time" placeholder=""  required>
            <input type="time" class="form-control" name="close_time" id="close_time" placeholder=""  required>
        </div>

        <div class="form-group">
            <label for="type">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
        </div>

        <div class="form-group">
            <label for="type">Doctor</label>
            <p>
                <select name="doctor" id="doctor">
                    <option value="yes">yes</option>
                    <option value="no">no</option>
                </select>
            </p>
        </div>
        <div class="form-group">
            <input type="number" lang="en" class="form-control" name="doctor_price" id="doctor_price" placeholder="Doctor Price" required>
        </div>

        <div class="form-group">
            <label for="type">Grooming</label>
            <p>
                <select name="grooming" id="grooming">
                    <option value="yes">yes</option>
                    <option value="no">no</option>
                </select>
            </p>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="grooming_price" id="grooming_price" placeholder="Grooming Price" required>
        </div>

        <div class="form-group">
            <label for="type">Hotel</label>
            <p>
                <select name="hotel" id="hotel">
                    <option value="yes">yes</option>
                    <option value="no">no</option>
                </select>
            </p>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="hotel_price" id="hotel_price" placeholder="Hotel Price"  required>
        </div>

        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection