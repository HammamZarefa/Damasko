@extends('layouts.front')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portolio</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Portolio</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach ($pcategories as $category)
              <li data-filter=".{{ $category->id }}">{{ $category->name }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          @foreach ($portfolio as $portfolio)
          <div class="col-lg-4 col-md-6 portfolio-item {{ $portfolio->pcategory_id }}">
            <img src="{{ asset('storage/'.$portfolio->cover) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $portfolio->name }}</h4>
              <p>{{ $portfolio->pcategory->name }}</p>
              <a href="{{ asset('storage/'.$portfolio->cover) }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $portfolio->name }}"><i class="bx bx-plus"></i></a>
              <a href="{{ route('portfolioshow',$portfolio->slug) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
@endsection