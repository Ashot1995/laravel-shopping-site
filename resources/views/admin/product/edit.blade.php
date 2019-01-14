@extends("admin.layout.admin")

@section('content')

    <div class="container">
        <h1>Edit data</h1>
        <div class="row">

            <form action="{{action("ProductsController@update",$products->id)}}" enctype='multipart/form-data' method="post" >
                @csrf
                <input type="hidden" name="_method" value="PATCH"/>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$products->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" name="price" class="form-control" value="{{$products->price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" name="description">{{$products->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <select name="type" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Passive</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            @if($category['id']==$products->category_id)
                                <option value="{{$category['id']}}" selected="selected">{{$category['name']}} </option>
                            @else
                                <option value="{{$category['id']}}">{{$category['name']}} </option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <img src="{{asset('images/'.$products->image)}}"
                         style="height:110px;width: 150px">
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" value="Edit">
            </form>
        </div>
    </div>

@endsection
