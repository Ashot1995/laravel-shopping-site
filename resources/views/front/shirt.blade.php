@extends('layouts.main')

@section('title','shirt')

@section('content')


    <div class="row">
        <div class="small-5 small-offset-1 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="#">
                        <img src="{{asset("images/".$products->image)}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="item-wrapper">
                <h2 style="text-align: center">{{$products->name}}</h2>
                <h3 class="subheader">
                    <span class="price-tag">${{$products->price}}</span>
                </h3>
                <p>{{$products->description}}</p>
                <div class="row">
                    <div class="large-12 columns">

                        <a href="{{route('cart',$products->id)}}" class="button  expanded">Add to Cart</a>
                    </div>
                </div>

                <p class="text-left subheader"><small>* Designed by Ashot Gharakeshishyan </a></small></p>

            </div>
        </div>
    </div>

@endsection