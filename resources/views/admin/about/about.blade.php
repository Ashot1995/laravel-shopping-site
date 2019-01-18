@extends('layouts.main')

@section('title','About us')

@section('content')


    <div class="container">
        <div class="d-flex flex-row">
            <div>
                @foreach($data as $about)
                    <img src="{{asset('images/about/'.$about->image)}}" alt="image site" style="float: left;padding: 3%;width: 65%;
height: 500px">

                    <h1> {{$about->title}}</h1>
                    <p>
                        {{$about->description}}
                    </p>

            </div>
            @endforeach
        </div>
    </div>

@endsection