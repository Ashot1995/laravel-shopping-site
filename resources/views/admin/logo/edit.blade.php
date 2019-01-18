@extends("admin.layout.admin")

@section('content')


    <div class="container">
        <h1>Edit About</h1>
        <div class="row">

            <form action="{{action("LogoController@update",$logo->id)}}"  enctype='multipart/form-data' method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH"/>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control"  value="{{$logo->name}}">
                </div>

                <div class="form-group">
                    <img src="{{asset('images/logos/'.$logo->image)}}" class="circle" style="height:150px;width: 150px;border-radius: 100%" alt="">
                    <input type="file" name="image" class="form-control" >
                </div>
                <input type="submit"class="btn btn-primary" value="Edit">
            </form>
        </div>

    </div>



@endsection