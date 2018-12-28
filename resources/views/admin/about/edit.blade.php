@extends("admin.layout.admin")

@section('content')


    <div class="container">
        <h1>Edit About</h1>
        <div class="row">

            <form action="{{action("AboutController@update",$about->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH"/>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control"  value="{{$about->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control"  value="{{$about->description}}">
                </div>
                <div class="form-group">
                    <img src="{{asset('images/'.$about->image)}}" class="img-circle" style="height:150px;width: 150px" alt="">
                    <input type="file" name="image" class="form-control" >
                </div>
                <input type="submit"class="btn btn-primary" value="Edit">
            </form>
        </div>

    </div>



@endsection