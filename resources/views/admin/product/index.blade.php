@extends("admin.layout.admin")

@section('content')
    <h3>Products</h3>

    <table class="table" style="">
        <thead class="thead-dark">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>

        </thead>
        <tbody id="productBody">
        @foreach($products as $product)
            <tr id="{{$product->id}}">
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td><img src="{{asset("images/".$product->image)}}" style="width: 60px;height: 50px" alt=""></td>
                <td><a class="btn btn-primary" href="{{action('ProductsController@edit',$product->id)}}">Edit</a></td>

                <td>{{ Form::open(['url'=>route("productDelete",$product->id),"method"=>"DELETE"]) }}
                    {{ Form::submit('Delete',array("class"=>'btn btn-danger'))}}
                    {!!Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
