@extends('layouts.front')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('content')
<main id="main">
    <? $stars=$dish->stars(); ?>
<!-- &&&&&&&&& product details &&&&&&&&& -->
<div class="container-fluid modul-bt-one">
  <div class="container modul-space-sixteen">
    <div class="row">
      <div class="col-md-12">
        <!-- Dishes Detail -->
        <div class="Dishes-detail">
          <!-- Image -->
          <div class="wrapper light-wrapper">
            <div class="container inner">
              <div class="grid grid-view boxed">
                <div class="tiles text-center light-gallery-wrapper">
                  <div class="row isotope">
                    <!-- /.item -->
                    <div class="item grid-sizer col-sm-12 col-lg-6 video application">
                      <div class="box bg-white shadow p-30">
                        <figure class="main overlay overlay2 rounded mb-30">
                          <a href="" class="lightbox">
                            <img src="{{ asset('storage/'.$dish->cover) }}" alt="" /></a></figure>
                      </div>
                      <!-- /.box -->
                    </div>
                    <div style="text-align: start;" class="item grid-sizer col-sm-12 col-lg-6 video application">
                      <h2>{{$dish->name}}</h2>
                      <h6>{{$dish->summary}}</h6>
                      {{--<h6> Bridge</h6>--}}
                        <h6> {{$dish->keywords}}</h6>
                        <!-- /.box -->
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.tiles -->
              </div>
            </div>
            <!-- /.container -->
          </div>
          <p>
              {!! $dish->desc !!}
          </p>
          <div class="well Dishes-editor-rating">
            <div class="row">
              <div class="col-xs-12 col-md-4 text-center">
                <h1>
                 <?php echo $stars; ?></h1>
                <div class="rating-d">
                        @for($i=0;$i<5;$i++)
                            @if($i<$stars)
                                <span class="fa fa-star"></span>
                            @else
                                <span class="fa fa-star-empty"></span>
                            @endif
                        @endfor
                </div>
                <div>
                  <span class="fa fa-user"></span> {{ count($comments)}} @lang('total')
                </div>
              </div>
              <div class="col-xs-12 col-md-8">
                <div class="row rating-desc">
                  <div class="col-xs-12 col-md-3 text-right">
                    <span class="fa fa-star" style="margin-inline-end: 5px;"></span>5
                  </div>
                  <div class="col-xs-8 col-md-9">
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{count($comments->where('stars',5))*100/count($comments->whereNotNull('stars'))}}%">
                        <span class="sr-only">80%</span>
                      </div>
                    </div>
                  </div>
                  <!-- end 5 -->
                  <div class="col-xs-12 col-md-3 text-right">
                    <span class="fa fa-star" style="margin-inline-end: 5px;"></span>4
                  </div>
                  <div class="col-xs-8 col-md-9">
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{count($comments->where('stars',4))*100/count($comments->whereNotNull('stars'))}}%">
                        <span class="sr-only">60%</span>
                      </div>
                    </div>
                  </div>
                  <!-- end 4 -->
                  <div class="col-xs-12 col-md-3 text-right">
                    <span class="fa fa-star" style="margin-inline-end: 5px;"></span>4
                  </div>
                  <div class="col-xs-8 col-md-9">
                    <div class="progress">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{count($comments->where('stars',3))*100/count($comments->whereNotNull('stars'))}}%">
                        <span class="sr-only">40%</span>
                      </div>
                    </div>
                  </div>
                  <!-- end 3 -->
                  <div class="col-xs-12 col-md-3 text-right">
                    <span class="fa fa-star" style="margin-inline-end: 5px;"></span>2
                  </div>
                  <div class="col-xs-8 col-md-9">
                    <div class="progress">
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{count($comments->where('stars',2))*100/count($comments->whereNotNull('stars'))}}%">
                        <span class="sr-only">20%</span>
                      </div>
                    </div>
                  </div>
                  <!-- end 2 -->
                  <div class="col-xs-12 col-md-3 text-right">
                    <span class="fa fa-star" style="margin-inline-end: 5px;"></span>1
                  </div>
                  <div class="col-xs-8 col-md-9">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: {{count($comments->where('stars',1))*100/count($comments->whereNotNull('stars'))}}%">
                        <span class="sr-only">15%</span>
                      </div>
                    </div>
                  </div>
                  <!-- end 1 -->
                </div>
                <!-- end row -->
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>

        <!-- Share Dishes -->
        <div class="Dishes-share">
          <h5>@lang('SHARE DISHES'):</h5>
          <hr>
          <a href="http://www.facebook.com/sharer.php?u=https://damasko-oy.com/" class="btn btn-default share-Dishes" target="_blank">
            <i class="fa fa-facebook fa-lg"></i>
          </a>
          <a href="https://twitter.com/share?url=https://damasko-oy.com/&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" class="btn btn-default share-Dishes" target="_blank">
            <i class="fa fa-twitter fa-lg"></i>
          </a>
          <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://damasko-oy.com/" class="btn btn-default share-Dishes" target="_blank">
            <i class="fa fa-linkedin fa-lg"></i>
          </a>
        </div>
        <!-- Comments -->
        <div class="comments-area">
          <h5>{{count($comments)}} @lang('COMMENTS'):</h5>
          <hr>
          <div class="comment-list">
            <ul class="media-list">
              <!-- #1 -->
              @foreach($comments as $comment)
              <li class="">
                <div class="media-body">
                  <h6 style="margin:0">{{$comment->client}}:
                    <span class="label label-primary badge-comment pull-right">{{$comment->date}}</span></h6>
                    <div class="rating-d">
                      @for($i=0;$i<5;$i++)
                        @if($i<$comment->stars && $comment->stars != null)
                          <span class="fa fa-star"></span>
                        @else
                          <span class="fa fa-star-o"></span>
                        @endif
                      @endfor
                    </div>
                  <p style="margin-top:10px">{{$comment->body}}. </p>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>

        <!-- Leave Comment -->
        <div class="leave-comment">
          <h5>@lang('LEAVE COMMENT'):</h5>
          <hr>
          <form class="row comment-forms" action="{{ route('comment.create') }}" method="POST">
              @csrf
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <div class="input-group input-group">
                  <span class="input-group-addon"><span class="fa fa-user"></span></span>
                  <input class="form-control" id="prependedInput-01" type="text" placeholder="@lang('Name'):" name="client" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group">
                  <span class="input-group-addon"><span class="fa fa-envelope "></span></span>
                  <input class="form-control" name="email" id="prependedInput-02" type="text" placeholder="@lang('Email'):">
                </div>
              </div>
              {{--<div class="form-group">--}}
                {{--<div class="input-group input-group">--}}
                  {{--<span class="input-group-addon"><span class="fa fa-link"></span></span>--}}
                  {{--<input class="form-control" id="prependedInput-03" type="text" placeholder="Web:">--}}
                {{--</div>--}}
              {{--</div>--}}
                <div class="form-group">
                    <div class="input-group input-group">
                        <label>@lang('Your Rate'): </label>
                        <span class="input-group-addon"><span ></span></span>
                        <div class="rating">
                            <input type="radio" name="rating" id="rating-5" value="5">
                            <label for="rating-5"></label>
                            <input type="radio" name="rating" id="rating-4" value="4">
                            <label for="rating-4"></label>
                            <input type="radio" name="rating" id="rating-3" value="3">
                            <label for="rating-3"></label>
                            <input type="radio" name="rating" id="rating-2" value="2">
                            <label for="rating-2"></label>
                            <input type="radio" name="rating" id="rating-1" value="1">
                            <label for="rating-1"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <textarea rows="8" name="body" placeholder="@lang('Add comment')..." class="form-control" ></textarea>
              </div>
                <input name="dish" value="{{$dish->id}}" hidden>
              <div class="form-group pull-right">
                <button type="submit" class="btn btn-info">@lang('Send Comment')</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- &&&&&&&&& product details &&&&&&&&& -->
</main>
@endsection