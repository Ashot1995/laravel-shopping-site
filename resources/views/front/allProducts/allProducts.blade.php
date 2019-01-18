@extends("layouts.main")

@section("content")



<div class="container">
    <div class="row" id="front">

        @foreach($products as $product)
        @if($product["type"]===1)

        <div class="item-wrapper col-md-3">
            <div class="img-wrapper">

                <a href="{{route('add',['page'=>$product->id])}}" class="button expanded add-to-cart">
                    Add to Cart
                </a>

                <a href="{{route('details',$product['id'])}}">
                    <img style="margin: 0 auto" src="{{url("images",$product['image'])}}"/>
                </a>

            </div>

            <a href="{{route('details',$product['id'])}}">
                <h4 style="text-align: center" class="desc">
                    {{$product['name']}}
                </h4>
            </a>
            <h5>
                ${{$product['price']}}
            </h5>
            <p class="desc">
                {{$product['description']}}
            </p>
        </div>
        @endif


        @endforeach
    </div>
</div>

@endsection