@extends('layouts.admin')

@section('body')
<div class="container">
    @include('alert')
</div>

<h2 style="margin-left: 30px">User Data</h2>

<div class="table-responsive" style="margin-left: 30px; margin-right: 20px">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>User Type</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['name']}}</td>
            @if($user['type'] === 0 )
                <td>customer</td>
            @elseif($user['type'] === 1 )
                <td>admin petshop</td>
            @else
                <td>super admin</td>


            @endif
            <td>{{$user['email']}}</td>
            <td>{{$user['phone']}}</td>
            <td>{{$user['created_at']}}</td>
            <td>{{$user['updated_at']}}</td>
            <td><a href="#" class="btn btn-primary">Edit</a></td>
            <td><a href="#"  class="btn btn-warning">Remove</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endsection
</div>

