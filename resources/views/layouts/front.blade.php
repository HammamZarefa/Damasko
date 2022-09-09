<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="img/ico/favicon.png">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    @yield('title')
    {{ $general->title }}</title>
  <meta content="{{ $general->meta_desc }}" name="description">
  <meta content="{{ $general->keyword }}" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('storage/'.$general->favicon) }}" rel="icon">
  <link href="{{ asset('storage/'.$general->logo) }}" rel="apple-touch-icon">
  {{--<link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">--}}
  <link href="{{ asset('front/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  {{--<link href="{{ asset('front/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">--}}
  {{--<link href="{{ asset('front/vendor/animate.css/animate.min.css') }}" rel="stylesheet">--}}
  {{--<link href="{{ asset('front/vendor/venobox/venobox.css') }}" rel="stylesheet">--}}
  {{--<link href="{{ asset('front/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">--}}
  {{--<link href="{{ asset('front/vendor/aos/aos.css') }}" rel="stylesheet">--}}
  {{--<link href="{{ asset('front/vendor/remixicon/remixicon.css') }}" rel="stylesheet">--}}
  @yield('meta')
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



  <!-- Template Main CSS File -->
  <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
  
  {{-- Sharethis --}}
  {{--{!! $general->sharethis !!}--}}

  <!-- =======================================================
  * Template Name: Company - v2.1.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  {{--<header id="header" class="fixed-top">--}}
    {{--<div class="container d-flex align-items-center">--}}

      {{--<a href="/" class="logo mr-auto"><img src="{{ asset('storage/'.$general->logo) }}" alt="" class="img-fluid"></a>--}}

      {{--<nav class="nav-menu d-none d-lg-block">--}}
        {{--<ul>--}}
          {{--<li {{ request()->is('/') ? 'class=active' : '' }}><a href="{{ route('homepage') }}">Home</a></li>--}}

          {{--<li class="drop-down"><a href="">About</a>--}}
            {{--<ul>--}}
              {{--<li {{ request()->is('about-us') ? 'class=active' : '' }}><a href="{{ route('about') }}">About Us</a></li>--}}
              {{--<li {{ request()->is('testimonials') ? 'class=active' : '' }}><a href="{{ route('testi') }}">Testimonials</a></li>--}}
            {{--</ul>--}}
          {{--</li>--}}

          {{--<li {{ request()->is('services') ? 'class=active' : '' }}><a href="{{ route('service') }}">Services</a></li>--}}
          {{--<li {{ request()->is('portfolio') ? 'class=active' : '' }}><a href="{{ route('portfolio') }}">Portfolio</a></li>--}}
          {{--<li {{ request()->is('blog') ? 'class=active' : '' }}><a href="{{ route('blog') }}">Blog</a></li>--}}
      {{----}}
        {{--</ul>--}}
      {{--</nav><!-- .nav-menu -->--}}

      {{--<div class="header-social-links">--}}
        {{--<a href="{{ $general->twitter }}" target="_blank" class="twitter"><i class="icofont-twitter"></i></a>--}}
        {{--<a href="{{ $general->facebook }}" target="_blank" class="facebook"><i class="icofont-facebook"></i></a>--}}
        {{--<a href="{{ $general->instagram }}" target="_blank" class="instagram"><i class="icofont-instagram"></i></a>--}}
        {{--<a href="{{ $general->linkedin }}" target="_blank" class="linkedin"><i class="icofont-linkedin"></i></i></a>--}}
      {{--</div>--}}

    {{--</div>--}}
  {{--</header><!-- End Header -->--}}
  <!--Nav-->
  <nav>
    <div class="container">
      <div class="row">
        <!--Logo-->
        <div class="col-md-2">
          <a class="logo" href="index.html">
           <img src="{{ asset('storage/'.$general->logo) }}"/>
          </a>
        </div>
        <!--Logo-->

        <div class="col-md-10">
          <!--Menu-->
          <ul id="menu" class="sf-menu">

            <li><a href="#projects">{{ __('messages.latestdishes') }}</a></li>
            {{--<li><a href="#services">{{ __('messages.features') }}</a></li>--}}
            {{--<li><a href="#">Features</a>--}}
              {{--<ul>--}}
                {{--<li><a href="index_full_slide.html">Full Slider</a></li>--}}
                {{--<li><a href="index_video.html">Slider Video</a></li>--}}
                {{--<li><a href="sample_page.html">Sample Page</a></li>--}}
                {{--<li>--}}
                  {{--<a href="#">Third Level</a>--}}
                  {{--<ul>--}}
                    {{--<li><a href="#">Link Third Level</a></li>--}}
                    {{--<li><a href="#">Link Third Level</a></li>--}}
                  {{--</ul>--}}
                {{--</li>--}}
              {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="#pricing_info">{{ __('messages.pricingmenu') }}</a></li>--}}
            <li><a href="#contact">{{ __('messages.contact') }}</a></li>
            @php $locale = session()->get('locale'); @endphp
            {{--<li class="nav-item dropdown">--}}

            @switch($locale)
              @case('en')
              <a class="lang" href="lang/fi"> <img src="{{asset('front/img/flag/fi.jpg')}}" width="25px"> FI </a>
              @break
              @case('fi')
              <a class="lang" href="lang/en"> <img src="{{asset('front/img/flag/en.jpg')}}" width="25px"> EN </a>
              @break
              @default
              <a class="lang" href="lang/en"> <img src="{{asset('front/img/flag/en.jpg')}}" width="25px"> EN </a>
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

  <!-- ======= Footer ======= -->
  <!--footer-->
  {{--<footer>--}}
    {{--<div class="container">--}}

      {{--<!--Numbers Phone-->--}}
      {{--<div class="numbers_phone">--}}
        {{--<div class="row">--}}
          {{--<div class="col-md-6">--}}

            {{--<div class="number_phone_right">--}}
              {{--<h3><i class="fa fa-home"></i> {{ __('messages.address') }}</h3>--}}
              {{--<p>{{ $general->address1 }}</p>--}}
              {{--<p>{{ $general->address2 }}</p>--}}
            {{--</div>--}}

          {{--</div>--}}

          {{--<div class="col-md-6">--}}

            {{--<h3><i class="fa fa-phone"></i> {{ __('messages.contact') }}</h3>--}}
            {{--<p>{{ __('messages.phone') }}:&nbsp;{{ $general->phone }}</p>--}}
            {{--<p>{{ __('messages.email') }}:&nbsp;--}}
              {{--<a href="mailto:{{ $general->email }}">{{ $general->email }}</a></p>--}}

          {{--</div>--}}

        {{--</div>--}}

        {{--<ul class="info_about center">--}}
          {{--<li><a href="#">{{ __('messages.communityguidelines') }}</a></li>--}}
          {{--<li><a href="#">{{ __('messages.tosprivacy') }}</a></li>--}}
          {{--<li><a href="#">{{ __('messages.helpfaq') }}</a></li>--}}
          {{--<li><a href="#">{{ __('messages.contact') }}</a></li>--}}
          {{--<li><a href="#">{{ __('messages.advertise') }}</a></li>--}}
          {{--<li><a href="#">{{ __('messages.factsfigures') }}</a></li>--}}
          {{--<li><a href="#">{{ __('messages.friends') }}</a></li>--}}
        {{--</ul>--}}
      {{--</div>--}}
      {{--<!--Numbers Phone-->--}}

    {{--</div>--}}
  {{--</footer>--}}
  <!--footer-->

  <!--Copry-->
  <div class="copry">
    <div class="container">
      <div class="col-md-2">

        <a class="logo" href="index.html">
          <img src="{{ asset('storage/'.$general->logo) }}"/>
        </a>

      </div>

      <div class="col-md-6">
        <p>All  copyright of respective owner, {{ $general->footer }} © 2021</p>
      </div>


      {{--<div class="col-md-4">--}}
        {{--<ul class="social_footer">--}}
          {{--<!--twitter-->--}}
          {{--<li>--}}
            {{--<a href="{{ $general->twitter }}">--}}
              {{--<i class="fa fa-twitter"></i>--}}
            {{--</a>--}}
          {{--</li>--}}
          {{--<!--twitter-->--}}

          {{--<!--instragram-->--}}
          {{--<li>--}}
            {{--<a href="{{ $general->instagram }}">--}}
              {{--<i class="fa fa-instagram"></i>--}}
            {{--</a>--}}
          {{--</li>--}}
          {{--<!--instragram-->--}}

          {{--<!--linkedin-->--}}
          {{--<li>--}}
            {{--<a href="{{ $general->linkedin }}">--}}
              {{--<i class="fa fa-linkedin"></i>--}}
            {{--</a>--}}
          {{--</li>--}}
          {{--<!--linkedin-->--}}

          {{--<!--youtube-->--}}
          {{--<li>--}}
            {{--<a href="{{ $general->youtube }}">--}}
              {{--<i class="fa fa-youtube-play"></i>--}}
            {{--</a>--}}
          {{--</li>--}}
          {{--<!--youtube-->--}}
        {{--</ul>--}}

      {{--</div>--}}
    </div>
  </div>
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
  <script type="text/javascript" src="{{ asset('front/js/slide/camera.js')}}" ></script>
  <script type='text/javascript' src="{{ asset('front/js/slide/jquery.easing.1.3.min.js')}}"></script>
  <!--Totop-->
  <script type="text/javascript" src="{{ asset('front/js/totop/jquery.ui.totop.js')}}" ></script>
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
