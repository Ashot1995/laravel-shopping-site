@extends("layouts.main")

@section("title","products")

@section("content")

    <div class="row">

@if(count($products))

        @foreach($products as $product)

            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{route('add',['page'=>$product->id])}}" class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{url("images",$product->image)}}"/>
                        </a>
                    </div>
                    <a href="{{route('product')}}">
                        <h3 class="desc">
                            {{$product->name}}
                        </h3>
                    </a>
                    <h5>
                        ${{$product->price}}
                    </h5>
                    <p class="desc">
                        {{$product->description}}
                    </p>
                </div>
            </div>

        @endforeach
    @else
            <p style="text-align: center;font-size: 200px">Empty data</p>
    @endif
    </div>

@endsection