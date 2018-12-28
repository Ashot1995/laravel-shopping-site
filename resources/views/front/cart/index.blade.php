@extends("layouts.main")

@section("content")

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>

        <tbody>

        <tr>
            <th scope="row"></th>
            @foreach($cart as $c)
            <td>{{$c->id}}</td>
            {{--<td>{{$c->name}}</td>--}}
            {{--<td>{{$c->name}}</td>--}}
            {{--<td>{{$c->name}}</td>--}}
            {{--<td>{{ Form::open(array('action'=>array('CartController@destroy',$c->id))) }}--}}
                {{--{{ Form::submit('Delete',array("class"=>'btn btn-danger'))}}--}}
                {{--{!! Form::close() !!}--}}
            {{--</td>--}}
          @endforeach

        </tr>



        </tbody>
    </table>

@endsection