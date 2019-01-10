@extends("layouts.main")

@section("content")


    @if(\Illuminate\Support\Facades\Auth::id())
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Bay</th>
                <th scope="col">Delete</th>


            </tr>
            </thead>

            <tbody>


            @foreach($cart as $c)

                <tr>
                    @if($c["type"]=="0")
                    <th scope="row">{{$c["product"]["id"]}}</th>
                    <td>{{$c["product"]["name"]}}</td>
                    <td>{{$c["product"]["price"]}}</td>
                    <td><img src="{{asset("images/".$c["product"]["image"])}}" style="height: 50px;width: 60px" alt="">
                    </td>

                    <td><a href="{{route('change',['page'=>$c['id']])}}" class="btn btn-primary">Buy</a>
                    </td>
                    <td>{{ Form::open(array('action'=>array('CartController@destroy',$c["id"]))) }}
                        {{ Form::submit('Delete',array("class"=>'btn btn-danger'))}}
                        {!! Form::close() !!}
                    </td>

                    @endif

                </tr>
            @endforeach


            </tbody>

        </table>
    @else
        <script>window.location = "/login";</script>
    @endif
@endsection