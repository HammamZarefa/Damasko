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
    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="wrapper light-wrapper" id="dish">
        <div class="container inner">
            <h2 class="title-color text-center"
                style="color:#4e7292;font-weight: bold;font-size: 1rem;">@lang('Our Dishes')</h2>
            <h3 class="display-3 text-center">@lang('See Our Latest Beautiful Dishes')</h3>
            <div class="space40"></div>
            <div class="container">
                <div class="row">
                    @foreach($dishes as $dish)
                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                <div class="header"
                                     style="background-image: url('{{ asset('storage/'.$dish->cover) }}')">
                                </div>
                                <div class="text">
                                    <h1 class="food">
                                        {{$dish->name}}
                                    </h1>
                                    <div class="info"><i class="fa fa-tag"> {{$dish->keywords}}</i></div>
                                    <div class="stars">
                                        <li>

                                            @for($i=0;$i<5;$i++)
                                                @if($i < $dish->stars())
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                @else
                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                @endif
                                            @endfor
                                        </li>
                                    </div>
                                    <p class="info">{{$dish->summary}}.</p>
                                </div>
                                <a href="{{ route('dish',$dish->id) }}" class="btn">@lang('Show Details')!</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>

    <!--Contact Form-->
    <section class="container" id="contact">
        <div class="contact_form center">
            <h2>@lang('Write us whatever you want')</h2>
            <!--Form-->
            <form  action="{{route('subscribe')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" id="name" placeholder="@lang('Name')" name="name" required="">
                    </div>
                    <div class="col-md-6">
                        <input type="email" id="email" placeholder="@lang('Email')" name="email" required="">
                    </div>
                </div>
                <textarea class="mini_top" placeholder="....@lang('Your Message')..." id="message" name="message"
                          required=""></textarea>
                <br>
                <input type="submit" class="mini_top botton" value="@lang('Send Message')" name="subscribe">
            </form>
            <div id="result" class="mini_top"></div>
            <!--Form-->
        </div>
    </section>
    <!--Contact Form-->
    <main id="main">
    </main><!-- End #main -->
@endsection