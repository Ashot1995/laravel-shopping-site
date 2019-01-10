<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @yield("title","Shopping")
    </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
    <link rel="stylesheet" href="{{asset("dist/css/app.css")}}"/>

    <link rel="stylesheet" type="text/css" href="{{'dist/contact/css/main.css'}}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
    <script src="{{asset("dist/js/app.js")}}"></script>
    <script src="{{asset("dist/js/vendor/jquery.js")}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous"></script>

</head>
<body>
<div class="top-bar ">
    <div class="container">
    <div style="color:white" class="top-bar-left">
        <h4 class="brand-title">
            <a href="{{route('home')}}">
                Shopping
            </a>
        </h4>
    </div>
    <div class="top-bar-right">
        <div class="menu d-flex">
            <nav id="primary_nav_wrap">

<?php echo $menuFront;  ?>

                        @if(\Illuminate\Support\Facades\Auth::id())
                            <a href="/logout">
                                Logout
                            </a>
                        @else
                            <a href="/login">
                                Login
                            </a>
                        @endif

            </nav>






        </div>
    </div>
    </div>
</div>

@yield("content")


<footer class="footer">
    <div class="row full-width"style="margin: 0;padding: 0">
        <div class="small-12 medium-4 large-4 columns">
            <i class="fi-laptop"></i>
            <p>Coded by Ashot Gharakeshishyan for Esterox Gyumre</p>
        </div>
        <div class="small-12 medium-4 large-4 columns">
            <i class="fi-html5"></i>
            <p>My shopping site</p>
            <p>My first project in laravel</p></div>

        <div class="small-6 medium-4 large-4 columns">
            <h4>Follow Us</h4>
            <ul class="footer-links">
                <li><a href="https://github.com/">GitHub</a></li>
                <li><a href="https://fb.com">Facebook</a></li>
                <li><a href="https://twitter.com/">Twitter</a></li>
            </ul>
        </div>
    </div>
</footer>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');

</script>


{{--contact--}}
<script src="{{asset("https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes")}}"></script>
<script src="{{asset("dist/contact/js/map-custom.js")}}"></script>
<script src="{{asset("dist/contact/js/main.js")}}"></script>



</body>
</html>