{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Products
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('product.index')}}">Products</a></li>

                    <li><a href="{{route('product.create')}}">Add Product</a></li>
                </ul>
            </li>


            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Categories
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('category.index')}}">Category</a></li>
                    <li><a href="{{route('category.create')}}">Add Category</a></li>

                </ul>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Menu
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('menu.index')}}">Menu</a></li>
                    <li><a href="{{route('menu.create')}}">Add Menu list</a></li>

                </ul>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> About us
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('about.index')}}">About</a></li>
{{--                    <li><a href="{{route('about.create')}}">About create</a></li>--}}

                </ul>
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->