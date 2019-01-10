@extends("admin.layout.admin")

@section('content')
    <h3>Users</h3>

    <table class="table" style="">
        <thead class="thead-dark">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>

        </thead>
        <tbody>

        @foreach($users as $key=>$user)

            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->type}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                @if($key !=0 )
                <td>
                    {{ Form::open(array('action'=>array('UserController@edit',$user->id))) }}
                    {{ Form::submit('Edit',array("class"=>'btn btn-primary'))}}
                    {!!Form::close() !!}
                </td>

                <td>{{ Form::open(array('action'=>array('UserController@destroy',$user->id))) }}
                    {{ Form::submit('Delete',array("class"=>'btn btn-danger'))}}
                    {!!Form::close() !!}
                </td>
@else
                    <td>
                        <input type="submit" value="Edit" class="btn btn-primary " disabled="disabled">
                    </td>

                    <td>
                        <input type="submit" value="Delete" class="btn btn-danger " disabled="disabled">
                    </td>
                    @endif
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
