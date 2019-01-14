@extends("layouts.main")

@section("content")


    {{--<header class="container">--}}
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="3" class="active"></li>
            </ol>

            <div class="carousel-inner">

            @foreach($productImg as $key=>$product)
                <!-- Slide Two - Set the background image for this slide in the line below -->
               @if($key===0)
                   <!-- Slide One - Set the background image for this slide in the line below -->
                       <div class="item active" >
                           <img src="{{asset('images/'.$product->image)}}" alt="slider image"style="width:75%;height:auto;max-height: 600px;margin: 0 auto" >
                           <div class="carousel-caption">
                               <h3>New product</h3>
                               <p>
                                   Welcome to our shopping site</p>
                           </div>
                       </div>
                   @else
                <div class="item" >
                    <img src="{{asset('images/'.$product->image)}}" alt="slider image"style="width:75%;height:auto;max-height: 600px;margin: 0 auto" >
                </div>
                   @endif
                   @endforeach

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    {{--</header>--}}



    <div class="container">
        <div class="row">

            @foreach($products as $product)
                @if($product["type"]===1)

                    <div class="item-wrapper col-md-3">
                        <div class="img-wrapper">

                            <a href="{{route('add',['page'=>$product->id])}}" class="button expanded add-to-cart">
                                Add to Cart
                            </a>

                            <a href="{{route('shirt',$product['id'])}}">
                                <img style="margin: 0 auto" src="{{url("images",$product['image'])}}"/>
                            </a>

                        </div>

                        <a href="{{route('shirt',$product['id'])}}">
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