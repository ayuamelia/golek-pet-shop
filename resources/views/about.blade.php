@extends('layouts.index')

@section('center')


<section>
    <div class="container">
        <div class="row">

            <h2 class="title text-center">About</h2>

            <div class="image">
                <img alt="" class="img-responsive fit-image" src="{{asset('img/about.jpg')}}" lazy="loaded">
            </div>

        </div>
    </div>
</section>

@endsection