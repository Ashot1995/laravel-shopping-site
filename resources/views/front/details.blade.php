@extends('layouts.main')

@section('title','shirt')

@section('content')

    <div class="row">
        <div class="small-5 small-offset-1 columns">
            <div class="item-wrapper">
                <div class="img">
                    <a href="#">
                        <img src="{{asset("images/".$products->image)}} " id = "big_img"/>
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

                        <a href="{{route('add',['page'=>$products->id])}}" class="button  expanded">Add to Cart</a>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection