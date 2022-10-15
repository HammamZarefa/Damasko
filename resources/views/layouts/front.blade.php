<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="{{asset('storage/'.$general->favicon) }}">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>
    @yield('title')
    {{ $general->title }}</title>
<meta content="{{ $general->meta_desc }}" name="description">
<meta content="{{ $general->keyword }}" name="keywords">

<!-- Favicons -->
<link href="{{ asset('storage/'.$general->favicon) }}" rel="icon">
<link href="{{ asset('storage/'.$general->logo) }}" rel="apple-touch-icon">
<link href="{{ asset('front/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
@yield('meta')

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">
<!-- Template Main CSS File -->
<link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/style2.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/style3.css') }}" rel="stylesheet">

<body>

<nav>
    <div class="container">
        <div class="row">
            <!--Logo-->
            <div class="col-md-2">
                <a class="logo" href="{{route('homepage')}}">
                    <img src="{{ asset('storage/'.$general->logo) }}"/>
                </a>
            </div>
            <!--Logo-->

            <div class="col-md-10">
                <!--Menu-->
                <ul id="menu" class="sf-menu">
                    <li><a href="{{route('homepage')}}#dish">@lang('Latest Dishes') </a></li>

                    <li><a href="{{route('homepage')}}#contact">@lang('Contact')</a></li>
                    @php $locale = session()->get('locale'); @endphp
                    {{--<li class="nav-item dropdown">--}}
                    @switch($locale)
                        @case('en')
                        <a class="lang" href="{{route('lang','fi')}}"> <img src="{{asset('front/img/flag/fi.png')}}" width="40px"> FI
                        </a>
                        @break
                        @case('fi')
                        <a class="lang" href="{{route('lang','en')}}"> <img src="{{asset('front/img/flag/en.png')}}" width="40px"> EN
                        </a>
                        @break
                        @default
                        <a class="lang" href="{{route('lang','en')}}"> <img src="{{asset('front/img/flag/en.png')}}" width="40px"> EN
                        </a>
                    @endswitch
                    {{--<li><a href="#step" class="botton"><i class="fa fa-thumbs-up"></i> | {{ __('messages.subscribenow') }}</a></li>--}}
                </ul>
                <!--Menu-->
            </div>
        </div>
    </div>
</nav>
<!--Nav-->


@yield('content')


<!--Copry-->
<div class="copry">
    <div class="container">
        <div class="col-md-2">
            <a class="logo" href="{{route('home')}}">
                <img src="{{ asset('storage/'.$general->logo) }}"/>
            </a>
        </div>
        <div class="col-md-6">
            <p>All copyright of respective owner, {{ $general->footer }} © 2021</p>
        </div>
    </div>
</div>
<a href="https://wa.me/{{$general->linkedin}}" id="whatsapp" target="_blank">
    <i class="icofont-whatsapp"></i>
</a>
<!--Copry-->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- local copy of jquery. -->

<script>window.jQuery || document.write('<script src="{{ asset('front/js/jquery-1.9.1.min.js')}}"><\/script>')</script>

<script type="text/javascript" src="{{ asset('front/js/modernizr.custom.72111.js')}}"></script>
<!--Bg Scroll-->
<script type="text/javascript" src="{{ asset('front/js/bg_scroll/jquery.bgscroll.js')}}"></script>
<!--Lightbox-->
<script type="text/javascript" src="{{ asset('front/js/fancybox/jquery.fancybox.js')}}"></script>
<!--Slide-->
{{--<script type="text/javascript" src="{{ asset('front/js/slide/camera.js')}}"></script>--}}
<script type='text/javascript' src="{{ asset('front/js/slide/jquery.easing.1.3.min.js')}}"></script>
<!--Totop-->
<script type="text/javascript" src="{{ asset('front/js/totop/jquery.ui.totop.js')}}"></script>
<!--Gallery Grid-->
<script type="text/javascript" src="{{ asset('front/js/gallery/modernizr.custom.26633.js')}}"></script>
<script type="text/javascript" src="{{ asset('front/js/gallery/jquery.gridrotator.js')}}"></script>
<!--Text Rotator-->
<script type="text/javascript" src="{{ asset('front/js/rotating_words/jquery.simple-text-rotator.js')}}"></script>
<!--Nav-->
<script type="text/javascript" src="{{ asset('front/js/nav/tinynav.js')}}"></script>
<script type="text/javascript" src="{{ asset('front/js/nav/superfish.js')}}"></script>
<!-- Bootstrap.js-->
<script type="text/javascript" src="{{ asset('front/js/bootstrap/bootstrap.js')}}"></script>
<!--fUNCTIONS-->
<script type="text/javascript" src="{{ asset('front/js/jquery-func.js')}}"></script>
{{--<script>window.jQuery || document.write("<script src='" + "{{ asset(" + "front/js/jquery-1.9.1.min.js')}}"+"></script>")</script>--}}
</body>

</html>
