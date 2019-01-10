@extends("admin.layout.admin")

@section('content')

    <div class="container">
        <h1>Edit data</h1>
        <div class="row">

{{--            <form action="{{action("UserController@update",$user->id)}}" method="post">--}}

            {!! Form::open(['url' =>route('updatek',["id"=>$user->id]),'method'=>'post','files'=>true]) !!}

            @csrf

                {{--<input type="hidden" name="_method" value="PATCH"/>--}}

                <div class="form-group">
                    {{Form::label("name","Name")}}
                    {{Form::text("name",$user->name,array("class"=>"form-control"))}}
                </div>

                <div class="form-group">
                    {{Form::label("email","Email")}}
                    {{Form::text("email",$user->email,array("class"=>"form-control"))}}
                </div>

                <div class="form-group">
                    {{Form::label("type","Type")}}
                    {{Form::select("type", ["user"=>"User","admin"=>"Admin"],$user->type,['class'=>'form-control','placeholder'=>'Select type'])}}
                </div>

                {{ Form::submit('Edit',array("class"=>'btn btn-primary'))}}
                {!!Form::close() !!}
            {{--</form>--}}
        </div>
    </div>

@endsection
