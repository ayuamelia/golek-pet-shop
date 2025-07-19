@extends('layouts.admin')

@section('body')

<h2 style="margin-left: 50px">User Report</h2>

<div class="table-responsive" style="margin-left: 50px; margin-right: 50px">
    <table class="table table-striped" style="border-style: solid">
        <thead style="border-style: solid">
        <tr style="border-style: solid">
            <th style="border-style: solid">Id</th>
            <th style="border-style: solid">Petshop ID</th>
            <th style="border-style: solid">Name</th>
            <th style="border-style: solid">Type</th>
            <th style="border-style: solid">Email</th>
            <th style="border-style: solid">Phone</th>
            <th style="border-style: solid">Last Updated</th>

        </tr>
        </thead>
        <tbody>

        @if(isset($user))
        @foreach($user as $user)
        <tr>
            <td style="border-style: solid">{{$user['id']}}</td>
            <td style="border-style: solid">{{$user['petshop_id']}}</td>
            <td style="border-style: solid">{{$user['name']}}</td>
            <td style="border-style: solid">{{$user['type']}}</td>
            <td style="border-style: solid">{{$user['email']}}</td>
            <td style="border-style: solid">{{$user['phone']}}</td>
            <td style="border-style: solid">{{$user['updated_at']}}</td>
        </tr>
        @endforeach

        <h4 align="right">Total Data: {{$userCount}}</h4>
        @endif
        </tbody>
    </table>

    @endsection
</div>

