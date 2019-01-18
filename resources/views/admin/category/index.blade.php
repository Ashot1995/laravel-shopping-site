@extends("admin.layout.admin")

@section('content')
    <h3>Categories</h3>

    <table class="table"  style="table-layout:fixed">
        <thead class="thead-dark">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Show products</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>


        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>

                <td><a class="btn btn-primary"href="{{route('category.show',$category->id)}}">Show</a></td>
                <td><a class="btn btn-primary"href="{{route('category.edit',$category->id)}}">Edit</a></td>

                <td>{{ Form::open(['url'=>route("categoryDelete",$category->id),"method"=>"DELETE"]) }}
                    {{ Form::submit('Delete',array("class"=>'btn btn-danger'))}}
                    {!! Form::close() !!}
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>




@endsection


