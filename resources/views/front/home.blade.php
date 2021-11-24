@extends('layouts.front')

@section('meta')
<!-- Primary Meta Tags -->
<meta name="description" content="{{ $general->meta_desc }}">
<meta name="keywords" content="{{ $general->keyword }}">
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="127.0.0.1:8000">
<meta property="og:title" content="{{ $general->title }}">
<meta property="og:description" content="{{ $general->meta_desc }}">
<meta property="og:image" content="{{ asset('storage/'.$general->favicon) }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="127.0.0.1:8000">
<meta property="twitter:title" content="{{ $general->title }}">
<meta property="twitter:description" content="{{ $general->meta_desc }}">
<meta property="twitter:image" content="{{ asset('storage/'.$general->favicon) }}">

@endsection

@section('content')
    {{--<!-- ======= Hero Section ======= -->--}}
  {{--<section id="hero">--}}
    {{--<div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">--}}

      {{--<div class="carousel-inner" role="listbox">--}}

        {{--@foreach ($banner as $key => $banner)--}}

        {{--<div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url({{asset('storage/'.$banner->cover)}});">--}}
          {{--<div class="carousel-container">--}}
            {{--<div class="carousel-content animate__animated animate__fadeInUp">--}}
              {{--<h2>{{ $banner->title }}</h2>--}}
              {{--<p>{{ $banner->desc }}</p>--}}
              {{--@isset($banner->link)--}}
              {{--<div class="text-center">--}}
                {{--<a href="{{ $banner->link }}" class="btn-get-started">Read More</a>--}}
              {{--</div>--}}
              {{--@endisset--}}
            {{--</div>--}}
          {{--</div>--}}
        {{--</div>--}}

        {{--@endforeach--}}


      {{--</div>--}}

      {{--<a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">--}}
        {{--<span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>--}}
        {{--<span class="sr-only">Previous</span>--}}
      {{--</a>--}}

      {{--<a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">--}}
        {{--<span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>--}}
        {{--<span class="sr-only">Next</span>--}}
      {{--</a>--}}

      {{--<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>--}}

    {{--</div>--}}
  {{--</section><!-- End Hero -->--}}

{{--//map section--}}
    <div class="container">
      <!--Text Rotate-->
      <h1 class="text_rotate center">
        <i class="quote_left"></i> <span class="rotate">{{ __('messages.topmessage') }}</span> <i class="quote_right"></i></h1>
      <!--Rotating Words-->

      <!--Slide and Newsletter-->
      <section class="intro_section">

        <div class="row">
          <div class="col-md-8">
            <div class="camera_wrap" id="slide">
            @foreach ($banner as $key => $banner)
              <!-- Item Slide -->
              <div  data-src="{{asset('storage/'.$banner->cover)}}">
                <div class="camera_caption fadeFromLeft">
                </div>
              </div>
              <!-- End Item Slide -->
              @endforeach
            </div>

          </div>

          <div class="col-md-4">
            <!--Newsletter-->
            <div class="newsletter">
              <h2>{{ __('messages.latestprom') }}</h2>
              <p>{{ __('messages.become') }}</p>
              <!-- Begin MailChimp Signup Form -->
              <div id="mc_embed_signup">
                <form class="validate" action="http://imaginacionweb.us4.list-manage1.com/subscribe/post?u=f9297aa4909dff7a0b00a9726&amp;id=4f4fbf8f69" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>

                  <input type="text" name="name" class="name" placeholder="{{ __('messages.namehere') }}">
                  <input type="email" name="EMAIL" class="email" id="mce-EMAIL" placeholder="{{ __('messages.emailaddresshere') }}">
                  <input type="submit" value="{{ __('messages.subscribe') }}" name="subscribe" id="mc-embedded-subscribe" class="botton">
                </form>
              </div>
              <!--End mc_embed_signup-->
            </div>
            <!--Newsletter-->
          </div>
        </div>

      </section>
      <!--Slide and Newsletter-->
    </div>

    <!--Map-->
    <section class="map center">
      <div class="container">

        <!--Rotating Words-->
        <h2 class="top">Offer the Best Dishes on Demand High Quality and Good Price</h2>
        <!--Rotating Words-->

        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

        <!--Buttons-->
        <ul class="buttons center">
          <li><a href="#" class="botton"><i class="fa fa-group"></i> | Online Order</a></li>
          <li>or</li>
          <li><a href="#" class="botton"><i class="fa fa-cutlery"></i> | See Our Principal Dishes</a></li>
        </ul>
        <!--Buttons-->

        <!--Social-->
        <div class="social center">
          <div class="row">

            <!--twitter-->
            <div class="col-md-3 icon_social delay1">
              <a href="{{ $general->twitter }}">
                <i class="fa fa-twitter"></i>
                <p>Help us with Twitter</p>
              </a>
            </div>
            <!--twitter-->

            <!--instragram-->
            <div class="col-md-3 icon_social delay2">
              <a href="{{ $general->instagram }}" class="">
                <i class="fa fa-instagram"></i>
                <p>Share our Pictures</p>
              </a>
            </div>
            <!--instragram-->

            <!--linkedin-->
            <div class="col-md-3 icon_social delay3">
              <a href="{{ $general->linkedin }}">
                <i class="fa fa-linkedin"></i>
                <p>Join with Us</p>
              </a>
            </div>
            <!--linkedin-->

            <!--youtube-->
            <div class="col-md-3 icon_social delay4">
              <a href="{{ $general->youtube }}">
                <i class="fa fa-youtube-play"></i>
                <p>See our New Videos</p>
              </a>
            </div>
            <!--youtube-->

          </div>
        </div>
        <!--Social-->

      </div>
    </section>
    <!--Map-->


    <!--dishes-->
    <section class="container projects" id="projects">

      <h2 class="center">See Our Latest Beautiful Dishes</h2>

      <div class="row">

        <div class="col-md-6">
          <div class="hover_big">
            <img src="{{ asset('storage/'.$portfolio[0]->cover) }}" alt="">
            <div class="text_hover_big">
              <h3>{{ $portfolio[0]->name }}</h3>
              <p><i class="fa fa-home"></i> Restaurant "{{ $portfolio[0]->client }}"</p>
              <p><i class="fa fa-cutlery"></i> <strong>{{ $portfolio[0]->pcategory->name }}</strong> Food</p>
              <p><i class="fa fa-tag"></i> Pies, Food, Plate</p>
              <div class="mini_top">
                <a class="fancybox botton" title="" href="{{ asset('storage/'.$portfolio[0]->cover) }}">See Dish</a>
              </div>
            </div>
          </div>
        </div>
        <!--Item Big Image-->

        <div class="col-md-6">
          <div class="row">
          @for($i=1;$i<5;$i++)
            <div class="col-md-6 project">

              <!--Item -->
              <div class="view view_more">
                <img src="{{ asset('storage/'.$portfolio[$i]->cover) }}" alt="">
                <div class="text_hover_small">
                  <h3>{{ $portfolio[$i]->name }}</h3>
                  <p><i class="fa fa-home"></i> {{ $portfolio[$i]->client }}</p>
                  <p><i class="fa fa-cutlery"></i> <strong>{{ $portfolio[$i]->pcategory->name }} food</strong></p>
                  <p><i class="fa fa-tag"></i> Pies, Food, Dish</p>
                  <div class="mini_top">
                    <a class="fancybox botton" title="" href="{{ asset('storage/'.$portfolio[$i]->cover) }}">See Dish</a>
                  </div>
                </div>
              </div>
              <!--Item -->
            </div>
          @endfor

          </div>

        </div>

      </div>
      <p class="center botton link_projects"><a href="#"><i class="fa fa-spinner"></i>  | Show me all Dishes</a></p>
    </section>
    <!--dishes-->




    <!--Services-->
    <section class="services" id="services">
      <div class="container">
        <h2 class="center">Look Some Features that We Offer you</h2>

        <div class="items_services center">

          <div class="row">
            @foreach($service as $service)
            <!--Item One-->
            <div class="col-md-4 item_service">
              <div class="icon_service">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="{{ $service->icon }}"></i>
                {{--<img src="{{ $service->icon }}) }}" alt="">--}}
              </div>
              <h3>{{ $service->title }}</h3>
              <p>{{ $service->quote }} </p>
            </div>
            <!--Item One-->
              @endforeach
          </div>

        </div>

      </div>
    </section>
    <!--Services-->



    <!-- Grid -->
    <div id="ri-grid" class="ri-grid ri-grid-size-1">
      <img class="ri-loading-image" src="{{ asset('storage/'.$portfolio[0]->cover) }}" alt="Image">
      <ul>
        @foreach($portfolio as $portfolio)
        <li><a href="#"><img src="{{ asset('storage/'.$portfolio->cover) }}" alt="Image"></a></li>
          @endforeach
      </ul>
    </div>
    <!-- Grid -->

    <!--Pricing table-->
    <section class="center pricing_info" id="pricing_info">
      <div class="container">
        <h2>We Have a Spectacular Menu</h2>

        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

      </div>
    </section>
    <!--Pricing table-->

    <!--Pricing-->
    <section class="container pricing">
      <div class="row">
        <div class="col-md-4">
          <!--Item -->
          @foreach($pricing as $pricing)
          <div class="item_table center delay1">
            <div class="image_option">
              <img src="{{ asset('front/img/pricing/1.jpg') }}" alt="">
              <div class="image_text_hover">
                <h3><i class="fa fa-cutlery"></i> {{$pricing->name}}</h3>
                <span><i class="fa fa-coffee"></i>  {{$pricing->short}}</span>
              </div>
            </div>
            <ul>
            @foreach(explode(',', $pricing->items) as $item)
              <li>{{$item}}</li>
            @endforeach
            </ul>
            <div class="moving">
              <a href="#" class="botton"><i class="fa fa-mail-reply-all"></i> | Ordering from ${{$pricing->price}}</a>
            </div>
          </div>
          @endforeach
          <!--Item -->
        </div>
      </div>
    </section>
    <!--Pricing-->

    <!--Contact Form-->
    <section class="container" id="contact">
      <div class="contact_form center">
        <h2>Write us whatever you want</h2>
        <!--Form-->
        <form id="form" action="send_mail.php">

          <div class="row">
            <div class="col-md-6">
              <input type="text"  id="name" placeholder="Name" name="name" required="">
            </div>

            <div class="col-md-6">
              <input type="email" id="email" placeholder="Email" name="email" required="">
            </div>
          </div>

          <textarea class="mini_top" placeholder="....Your Message..." id="message" name="message" required=""></textarea>
          <br>
          <input type="submit" class="mini_top botton" value="Send Message" name="subscribe">
        </form>

        <div id="result" class="mini_top"></div>

        <!--Form-->
      </div>
    </section>
    <!--Contact Form-->





















    <main id="main">

    {{--<!-- ======= About Us Section ======= -->--}}
    {{--<section id="about-us" class="about-us">--}}
      {{--<div class="container" data-aos="fade-up">--}}

        {{--<div class="section-title">--}}
          {{--<h2>About Us</strong></h2>--}}
        {{--</div>--}}

        {{--<div class="row content">--}}
          {{--<div class="col-lg-6" data-aos="fade-right">--}}
            {{--<h2>{{ $about->title }}</h2>--}}
            {{--<h3>{{ $about->subject }}</h3>--}}
          {{--</div>--}}
          {{--<div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">--}}
            {{--<p>--}}
              {{--{!! $about->desc !!}--}}
            {{--</p>--}}
          {{--</div>--}}
        {{--</div>--}}

      {{--</div>--}}
    {{--</section><!-- End About Us Section -->--}}

    {{--<!-- ======= Services Section ======= -->--}}
    {{--<section id="services" class="services section-bg">--}}
      {{--<div class="container" data-aos="fade-up">--}}

        {{--<div class="section-title">--}}
          {{--<h2>Services</strong></h2>--}}
          {{--<p>Laborum repudiandae omnis voluptatum consequatur mollitia ea est voluptas ut</p>--}}
        {{--</div>--}}

        {{--<div class="row">--}}

          {{--@foreach ($service as $service)--}}
              {{--<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">--}}
              {{--<div class="icon-box iconbox-blue">--}}
                {{--<div class="icon">--}}
                  {{--<svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">--}}
                    {{--<path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>--}}
                  {{--</svg>--}}
                  {{--<i class="{{ $service->icon }}"></i>--}}
                {{--</div>--}}
                {{--<h4><a href="{{ route('serviceshow',$service->slug) }}">{{ $service->title }}</a></h4>--}}
                {{--<p>{{ $service->quote }}</p>--}}
              {{--</div>--}}
            {{--</div>--}}
          {{--@endforeach--}}

        {{--</div>--}}

      {{--</div>--}}
    {{--</section><!-- End Services Section -->--}}

    {{--<!-- ======= Portfolio Section ======= -->--}}
    {{--<section id="portfolio" class="portfolio">--}}
      {{--<div class="container">--}}

        {{--<div class="section-title" data-aos="fade-up">--}}
          {{--<h2>Portfolio</h2>--}}
        {{--</div>--}}

        {{--<div class="row" data-aos="fade-up">--}}
          {{--<div class="col-lg-12 d-flex justify-content-center">--}}
            {{--<ul id="portfolio-flters">--}}
              {{--<li data-filter="*" class="filter-active">All</li>--}}
              {{--@foreach ($pcategories as $category)--}}
              {{--<li data-filter=".{{ $category->id }}">{{ $category->name }}</li>--}}
              {{--@endforeach--}}
            {{--</ul>--}}
          {{--</div>--}}
        {{--</div>--}}

        {{--<div class="row portfolio-container" data-aos="fade-up">--}}

          {{--@foreach ($portfolio as $portfolio)--}}
          {{--<div class="col-lg-4 col-md-6 portfolio-item {{ $portfolio->pcategory_id }}">--}}
            {{--<img src="{{ asset('storage/'.$portfolio->cover) }}" class="img-fluid" alt="">--}}
            {{--<div class="portfolio-info">--}}
              {{--<h4>{{ $portfolio->name }}</h4>--}}
              {{--<p>{{ $portfolio->pcategory->name }}</p>--}}
              {{--<a href="{{ asset('storage/'.$portfolio->cover) }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $portfolio->name }}"><i class="bx bx-plus"></i></a>--}}
              {{--<a href="{{ route('portfolioshow',$portfolio->slug) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
            {{--</div>--}}
          {{--</div>--}}
          {{--@endforeach--}}

        {{--</div>--}}

      {{--</div>--}}
    {{--</section><!-- End Portfolio Section -->--}}

    {{--<!-- ======= Our Clients Section ======= -->--}}
    {{--<section id="clients" class="clients">--}}
      {{--<div class="container" data-aos="fade-up">--}}

        {{--<div class="section-title">--}}
          {{--<h2>Partners</h2>--}}
        {{--</div>--}}

        {{--<div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">--}}

          {{--@foreach ($partner as $partner)--}}
          {{--<div class="col-lg-3 col-md-4 col-6">--}}
            {{--<div class="client-logo">--}}
              {{--<a href="{{ $partner->link }}" target="_blank" rel="noopener noreferrer">--}}
                {{--<img src="{{ asset('storage/'.$partner->cover) }}" class="img-fluid" alt="{{ $partner->name }}">--}}
              {{--</a>--}}
            {{--</div>--}}
          {{--</div>--}}
          {{--@endforeach--}}

        {{--</div>--}}

      {{--</div>--}}
    {{--</section><!-- End Our Clients Section -->--}}

  </main><!-- End #main -->
@endsection