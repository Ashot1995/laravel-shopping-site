@extends("admin.layout.admin")

@section('content')
    @if(isset($products))

        <h3>Products</h3>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td><img src="{{asset("images/".$product->image)}}" alt="image" height="50px" width="60px"></td>
                </tr>
            @empty
                <tr><td>No data</td></tr>
            @endforelse

            </tbody>
        </table>
    @endif
@endsection