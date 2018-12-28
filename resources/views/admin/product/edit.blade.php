@extends("admin.layout.admin")

@section('content')

    <div class="container">
        <h1>Edit data</h1>
        <div class="row">

            <form action="{{action("ProductsController@update",$products->id)}}" method="post">
               {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH"/>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control"  value="{{$products->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" name="price" class="form-control"  value="{{$products->price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea  class="form-control"  name="description" >{{$products->description}}</textarea>
                </div>
                <div class="form-group">
                    {{Form::label("category_id","Categories")}}
                    {{Form::select("category_id", $categories,null,['class'=>'form-control','placeholder'=>'Select category'])}}
                </div>
                <div class="form-group">
                    <img src="{{asset('images/'.$products->image)}}" class="img-circle" style="height:150px;width: 150px" alt="">
                    <input type="file" name="image" class="form-control" >
                </div>
                <input type="submit"class="btn btn-primary" value="Edit">
            </form>
        </div>
    </div>

@endsection
