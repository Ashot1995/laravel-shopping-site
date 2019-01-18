@extends("layouts.main")

@section("title","Products")

@section("content")

@if(count($products))
            <div class="container">
                <div class="row">

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
@else
                        @endif


                    @endforeach
                </div>
            </div>



    @else
            <p style="text-align: center;font-size: 200px">Empty data</p>
    @endif


@endsection