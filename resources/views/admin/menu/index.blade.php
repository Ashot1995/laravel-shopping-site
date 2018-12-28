@extends("admin.layout.admin")

@section('content')

    <h3>Menu</h3>
       <?php echo $menuView;  ?>

    <div class="alert alert-success" style="display: none">
        <strong id="mess"></strong>
    </div>

@endsection
