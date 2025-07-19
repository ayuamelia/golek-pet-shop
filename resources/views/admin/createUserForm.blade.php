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

    <form action="/admin/sendNewUserForm" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
            <label for="type">User Type</label><br>
            <select name="type" id="type" required>
                <option name="0" id="0">Customer</option>
                <option name="1" id="1">Admin Petshop</option>
                <option name="2" id="2">Super Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="petshop_id">Petshop ID</label>
            <input type="number" class="form-control" name="petshop_id" id="petshop_id" placeholder="Petshop ID" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="passwordpassword">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection