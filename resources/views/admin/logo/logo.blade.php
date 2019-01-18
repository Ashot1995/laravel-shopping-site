@extends("admin.layout.admin")

@section('content')
    <h3>Categories</h3>

    <table class="table"  style="table-layout:fixed;">
        <thead class="thead-dark">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">image</th>
            <th scope="col">Edit</th>


        </tr>
        </thead>
        <tbody>

        @foreach($logos as $logo)

            <tr>
                <th scope="row">{{$logo->id}}</th>
                <td>{{$logo->name}}</td>
                <td><img src="{{asset("images/logos/".$logo->image)}}" alt="image" style="height: 50px;width: 60px"></td>


                <td><a class="btn btn-primary"href="{{route('logos.edit',$logo->id)}}">Edit</a></td>


            </tr>
        @endforeach
        </tbody>
    </table>




@endsection
