@extends("layouts.main")

@section("title","Shirts")

@section("content")

    <div class="row">

@if(count($product))
        @foreach($product as $shirt)


            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{route('shirt')}}" class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{url("images",$shirt->image)}}"/>
                        </a>
                    </div>
                    <a href="{{route('shirt')}}">
                        <h3>
                            {{$shirt->name}}
                        </h3>
                    </a>
                    <h5>
                        ${{$shirt->price}}
                    </h5>
                    <p>
                        {{$shirt->description}}
                    </p>
                </div>
            </div>

        @endforeach
    @else
            <p style="text-align: center;font-size: 200px">Empty data</p>
    @endif
    </div>
@endsection