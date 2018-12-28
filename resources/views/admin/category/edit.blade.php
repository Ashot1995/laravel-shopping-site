@extends("admin.layout.admin")

@section('content')


    <div class="container">
        <h1>Edit category</h1>
        <div class="row">

            <form action="{{action("CategoriesController@update",$categories->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH"/>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control"  value="{{$categories->name}}">
                </div>
                <input type="submit"class="btn btn-primary" value="Edit">
            </form>
        </div>

    </div>



 @endsection
