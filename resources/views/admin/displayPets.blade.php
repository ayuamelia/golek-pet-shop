@extends('layouts.admin')

@section('body')

<h2 style="margin-left: 50px">Pet Data</h2>

<div class="table-responsive" style="margin-left: 50px; margin-right: 50px">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Age</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>

        @foreach($pets as $pet)
        <tr>
            <td>{{$pet['id']}}</td>
            <td>{{$pet['user_id']}}</td>
            <td>{{$pet['name']}}</td>
            <td>{{$pet['type']}}</td>
            <td>{{$pet['age']}}</td>
            <td>{{$pet['created_at']}}</td>
            <td>{{$pet['updated_at']}}</td>
            <td><a href="#" class="btn btn-primary">Edit</a></td>
            <td><a href="#"  class="btn btn-warning">Remove</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endsection
</div>

