@extends('layouts.admin')

@section('body')

<div>
    <div class="container">
        @include('alert')
    </div>
    <h2 style="margin-left: 50px">Filter User Report by</h2>

    <form action="/admin/reportUserData" method="post" style="margin-left: 50px" >
        <label for="start_date" style="margin-right:10px;">Start Date</label>
        <input type="date" name="start_date" id="start_date">
        <label for="end_date" style="margin-right:10px; margin-left: 20px">End Date</label>
        <input type="date" name="end_date" id="end_date">
        <label for="search_key" style="margin-right:10px; margin-left: 20px">Keyword</label>
        <input type="text" name="search_key" id="search_key" placeholder="Search Key">
        <!--<label for="search_key" style="margin-right:10px; margin-left: 20px">Service Type</label>
        <select name="service" id="service">
            <option name="doctor" id="doctor">doctor</option>
            <option name="hotel" id="hotel">hotel</option>
            <option name="grooming" id="grooming">grooming</option>
        </select>-->
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"><br><br>
        <input class="btn btn-default" type="submit" value="Submit">
    </form>
</div>
@endsection