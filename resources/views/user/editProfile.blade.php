@extends('layouts.app')

@section('content')
<div class="container">
<div class="table-responsive">

    <form action="/updateProfile/{{$user->id}}" method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{$user->name}}" required>
        </div>

        <div class="form-group">
            <label for="description">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{$user->email}}" required>
        </div>

        <div class="form-group">
            <label for="description">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{$user->phone}}" required>
        </div>

        <div class="form-group">
            <label for="description">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{$user->password}}" required>
        </div>


        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
</div>
@endsection