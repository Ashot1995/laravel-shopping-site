@extends("admin.layout.admin")

@section('content')
    <h3>Add menu</h3>

    <div class="row">

        <div class="col-md-8 col-md-offset-3">
            {!! Form::open(['route' =>'menu.store','method'=>'post','files'=>true]) !!}

            <div class="form-group">
                {{Form::label("name","Name")}}
                {{Form::text("name",null,array("class"=>"form-control"))}}
            </div>

            <div class="form-group">
                {{Form::label("parent_id","Parent_id")}}
                {{Form::select("parent_id",$parent_id,null,array("class"=>"form-control","placeholder"=>"Select parent id"))}}
            </div>

            <div class="form-group">
                {{Form::label("url","url")}}
                {{Form::text("url",null,array("class"=>"form-control"))}}
            </div>
            <div class="form-group">
                {{Form::label("category_id","Categories")}}
                {{Form::select("category_id", $categories,null,['class'=>'form-control','placeholder'=>'Select category'])}}
            </div>

            <div class="form-group">
                {{Form::label("active","Active")}}
                {{Form::select("active",['1'=>"active",'0'=>"passive"],null,['class'=>'form-control'])}}
            </div>

            {{Form::submit("Create",array("class"=>'btn btn-success'))}}



        </div>



    </div>

@endsection
