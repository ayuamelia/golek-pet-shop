@extends('layouts.admin')

@section('body')

<h2 style="margin-left: 50px">Pet Report</h2>

<div class="table-responsive" style="margin-left: 50px; margin-right: 50px;">
    <table class="table table-striped" style="border-style: solid">
        <thead style="border-style: solid">
        <tr style="border-style: solid">
            <th style="border-style: solid">Id</th>
            <th style="border-style: solid">User ID</th>
            <th style="border-style: solid">Name</th>
            <th style="border-style: solid">Age</th>
            <th style="border-style: solid">Type</th>
            <th style="border-style: solid">Last Updated</th>

        </tr>
        </thead>
        <tbody>

        @if(isset($pet))
        @foreach($pet as $pet)
        <tr>
            <td style="border-style: solid">{{$pet['id']}}</td>
            <td style="border-style: solid">{{$pet['user_id']}}</td>
            <td style="border-style: solid">{{$pet['name']}}</td>
            <td style="border-style: solid">{{$pet['age']}}</td>
            <td style="border-style: solid">{{$pet['type']}}</td>
            <td style="border-style: solid">{{$pet['updated_at']}}</td>
        </tr>
        @endforeach

        <h4 align="right">Total Data: {{$petCount}}</h4>
        @endif
        </tbody>
    </table>

    @endsection
</div>

