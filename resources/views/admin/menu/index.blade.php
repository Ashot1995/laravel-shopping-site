@extends("admin.layout.admin")

@section('content')

    <h3>Menu</h3>
    <?php echo $menuView;  ?>
    <div class="alert" style="display: none;width: 30%;">
        <strong id="mess"></strong>
    </div>

    </div>


@endsection
