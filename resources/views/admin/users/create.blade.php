@extends("admin.layout.admin")

@section('content')
    <h3>Add Admin</h3>

    <div class="row">

        <div class="col-md-8 col-md-offset-3">
            {!! Form::open(['route' =>'newUser','method'=>'post','files'=>true]) !!}

            <div class="form-group">
                {{Form::label("name","Name")}}
                {{Form::text("name",null,array("class"=>"form-control"))}}
            </div>


            <div class="form-group">
                {{Form::label("email","Email")}}
                {{Form::email("email",null,array("class"=>"form-control"))}}
            </div>

            <div class="form-group">
                {{Form::label("password","Password")}}
                {{Form::password("password",["class"=>"form-control","id"=>"password"])}}
            </div>
            <div class="form-group">
                {{Form::label("password","Confirm Password")}}
                {{Form::password("password_confirmation",array("class"=>"form-control","id"=>"password-confirm"))}}
            </div>
            <div class="form-group">
                {{Form::label("type","Type")}}
                {{Form::select("type",["admin"=>"Admin","user"=>"User"],"admin",array("class"=>"form-control"))}}
            </div>



            {{Form::submit("Create",array("class"=>'btn btn-success'))}}







        </div>



    </div>

@endsection
