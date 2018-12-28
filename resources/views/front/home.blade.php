@extends("layouts.main")

@section("content")


    <header class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>

            <div class="carousel-inner" role="listbox">

            @foreach($productImg as $key=>$product)
                <!-- Slide Two - Set the background image for this slide in the line below -->
               @if($key===0)
                   <!-- Slide One - Set the background image for this slide in the line below -->
                       <div class="carousel-item img-fluid active" >
                           <img src="{{asset('images/'.$product->image)}}" alt="slider image"width="1500" >
                           <div class="carousel-caption">
                               <h3>New product</h3>
                               <p>
                                   Welcome to our shopping site</p>
                           </div>
                       </div>
                   @else
                <div class="carousel-item" >
                    <img src="{{asset('images/'.$product->image)}}" alt="slider image"width="1500" >
                </div>
                   @endif
                   @endforeach

            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only" >Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>



    <div class="container">

            @foreach($products as $shirt)

            <div class="col-md-3 columns">
                    <div class="item-wrapper">
                        <div class="img-wrapper">

                            <a href="{{route('cart',$shirt['id'])}}" class="button expanded add-to-cart">
                                Add to Cart
                            </a>

                            <a href="{{route('shirt',$shirt['id'])}}">
                                <img src="{{url("images/",$shirt['image'])}}"/>
                            </a>

                        </div>
                        <a href="{{route('shirt',$shirt['id'])}}">
                            <h3>
                                {{$shirt['name']}}
                            </h3>
                        </a>
                        <h5>
                           ${{$shirt['price']}}
                        </h5>
                        <p>
                            {{$shirt['description']}}
                        </p>
                    </div>
                </div>


        @endforeach
    </div>

@endsection