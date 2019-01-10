@extends("admin.layout.admin")

@section('content')
    <h3>Categories</h3>

    <table class="table" style="">
        <thead class="thead-dark">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">image</th>
            <th scope="col">Edit</th>
            {{--<th scope="col">Delete</th>--}}


        </tr>
        </thead>
        <tbody>
        @foreach($abouts as $about)
            <tr>
                <th scope="row">{{$about->id}}</th>
                <td>{{$about->title}}</td>
                <td>{{$about->description}}</td>
                <td>{{$about->image}}</td>

                <td><a class="btn btn-primary"href="{{route('about.edit',$about->id)}}">Edit</a></td>

                {{--<td>{{ Form::open(array('action'=>array('AboutController@destroy',$about->id))) }}--}}
                    {{--{{ Form::submit('Delete',array("class"=>'btn btn-danger'))}}--}}
                    {{--{!! Form::close() !!}--}}
                {{--</td>--}}


            </tr>
        @endforeach
        </tbody>
    </table>




@endsection
