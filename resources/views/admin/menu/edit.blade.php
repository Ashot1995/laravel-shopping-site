@extends("admin.layout.admin")

@section('content')
    <h3>Edit menu</h3>

    <div class="row">

        <div class="col-md-8 col-md-offset-3">
            {!! Form::open(['url'=>route("updateMenu",$res['id']),"method"=>"put"]) !!}

            <div class="form-group">
                {{Form::label("name","Name")}}
                {{Form::text("name",$res["name"],array("class"=>"form-control"))}}
            </div>

            <div class="form-group">
                {{Form::label("parent_id","Parent")}}
                {{Form::select("parent_id",$parent_id,$res["parent_id"],array("class"=>"form-control","placeholder"=>"Select parent id"))}}
            </div>

            <div class="form-group">
                {{Form::label("url","url")}}
                {{Form::text("url",$res["url"],array("class"=>"form-control"))}}
            </div>
            <div class="form-group">
                {{Form::label("category_id","Categories")}}
                {{Form::select("category_id", $categories,$res["category_id"],['class'=>'form-control','placeholder'=>'Select category'])}}
            </div>

            <div class="form-group">
                {{Form::label("active","Active")}}
                {{Form::select("active",['1'=>"active",'0'=>"passive"],$res["active"],['class'=>'form-control'])}}
            </div>

            {{Form::submit("Create",array("class"=>'btn btn-success'))}}



        </div>



    </div>

@endsection
