@extends('layouts.app')

@section('content')

<div class="container">
    @include('alert')
</div>
<style>

    div {
        border-style: solid;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile Page</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>{!! Auth::user()->name !!}</h4>
                    <p>
                        <i class="glyphicon glyphicon-envelope" style="padding-right: 10px"></i>{!! Auth::user()->email !!}
                        <br />
                        <i class="glyphicon glyphicon-phone"style="padding-right: 10px"></i>{!! Auth::user()->phone !!}
                        <!--<br />
                        <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>-->
                        <br><br>
                    </p>


                    <h4>Pet Information</h4>

                    @foreach($home as $item)

                    <div style="border:1px solid black; margin-top: 15px; border-radius: 5px; width: 150px">
                        <p>
                            <i class="glyphicon glyphicon-heart" style="padding-right: 10px; margin-left: 10px; margin-top: 10px"></i>{{$item->name}} <br>
                            <i class="glyphicon glyphicon-calendar" style="padding-right: 10px; margin-left: 10px"></i>{{$item->age}} <br>
                            <i class="glyphicon glyphicon-sound-stereo" style="padding-right: 10px; margin-left: 10px"></i>{{$item->type}}
                        </p>
                    </div>


                    @endforeach




                        <br><br>
                        <a class="btn btn-default" href="{{ route('addPet', ['id' =>Auth::user()->id ]) }}"> Add New Pet </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
