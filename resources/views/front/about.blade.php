@extends('layouts.front')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>About</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>About</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= About Us Section ======= -->
      <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
  
          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
              <h2>{{ $about->title }}</h2>
              <h3>{{ $about->subject }}</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
              <p>
                {!! $about->desc !!}
              </p>
             
            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->
  
      <!-- ======= Our Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>Our <strong>Team</strong></h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <div class="row">
  
           @foreach ($team as $team)
           <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="{{ asset('storage/'.$team->photo) }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="{{ $team->twitter }}"><i class="icofont-twitter"></i></a>
                  <a href="{{ $team->facebook }}"><i class="icofont-facebook"></i></a>
                  <a href="{{ $team->instagram }}"><i class="icofont-instagram"></i></a>
                  <a href="{{ $team->linkedin }}"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $team->name }}</h4>
                <span>{{ $team->position }}</span>
              </div>
            </div>
          </div>
           @endforeach
  
          </div>
  
        </div>
      </section><!-- End Our Team Section -->
  
      <!-- ======= Our Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Partners</h2>
          </div>
  
          <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
  
            @foreach ($partner as $partner)
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <a href="{{ $partner->link }}" target="_blank" rel="noopener noreferrer">
                  <img src="{{ asset('storage/'.$partner->cover) }}" class="img-fluid" alt="{{ $partner->name }}">
                </a>
              </div>
            </div>
            @endforeach
  
          </div>
  
        </div>
      </section><!-- End Our Clients Section -->

       <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Frequently Asked Questions</h2>
          </div>
  
          <div class="faq-list">
            <ul>
              @foreach ($faq as $key => $faq)
              <li data-aos="fade-up">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-{{ $faq->id }}">{{ $faq->question }} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-{{ $faq->id }}" class="collapse {{$key == 0 ? 'show' : '' }}" data-parent=".faq-list">
                  <p>
                    {{ $faq->answer }}
                  </p>
                </div>
              </li>
              @endforeach
  
            </ul>
          </div>
  
        </div>
      </section><!-- End Frequently Asked Questions Section -->
  
    </main><!-- End #main -->
@endsection