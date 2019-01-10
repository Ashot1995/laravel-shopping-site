@extends("admin.layout.admin")

@section('content')
<div class="container">
    <h1>Create category</h1>
    <div class="row">
        {!! Form::open(['route' =>'category.store','method'=>'post','files'=>true]) !!}                <div class="modal-body">
            <div class="form-group">
                {{ Form::label('name', 'Category name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{Form::submit("Create",array("class"=>'btn btn-success'))}}
            </div>
        </div>
    </div>
</div>
@endsection