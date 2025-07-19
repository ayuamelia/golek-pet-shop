@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">

        <form action="{{ action('HomeController@sendNewPet', ['id' =>Auth::user()->id ]) }}" method="post">

            {{csrf_field()}}

            <div class="form-group" style="width: 300px">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Pet Name" required><br>

                <input type="text" class="form-control" name="age" id="age" placeholder="Age" required>

                <select style="margin-top: 20px" name="type" id="type" >
                    <option selected disabled>Choose one</option>
                    <option value="Cat" id="Cat">Cat</option>
                    <option value="Dog" id="Dog">Dog</option>
                </select>

            </div>

            <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>

    </div>
</div>
@endsection