@extends("admin.layout.admin")

@section('content')
    <h3>Add Product</h3>

    <div class="row">

        <div class="col-md-8 col-md-offset-3">

            <form id="form">
                <span id="res"></span>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" required>
                </div>


                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" placeholder="Description" name="description"
                           id="description" required>
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" placeholder="Price" name="price" id="price" required>
                </div>


                <div class="form-group">
                    <label for="">Category</label>
                    {{Form::select("category_id", $categories,null,['class'=>'form-control','placeholder'=>'Select category',"id"=>"category_id","required"])}}
                </div>


                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="upload-demo" style="background:#e1e1e1;width:350px;height: 300px"></div>
                    </div>
                    <div class="col-md-2" >
                        <div id="upload-demo-i" style="margin-top: 30px;width:300px;height:300px"></div>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="file" id="upload" style="margin-top:100%" required>
                    <br/>
                    <a class="btn btn-info upload-result disabled">Crop</a>
                </div>

                <input id="create111"  class="btn btn-success float-right" value="create">
            </form>


        </div>


    </div>

@endsection
