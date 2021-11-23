@extends('layouts.front')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{ $page->title }}</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>{{ $page->title }}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">
        <div class="row">

          {!! $page->text !!}        

        </div>
      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->
@endsection