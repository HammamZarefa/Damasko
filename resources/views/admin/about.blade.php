@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('about.update',1) }}" method="POST" enctype="multipart/form-data">
    @csrf

  <div class="form-group ml-5">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-7">
      <input type="text" name='title' class="form-control {{$errors->first('title') ? "is-invalid" : "" }} " value="{{old('title') ? old('title') : $about->title}}" id="link" placeholder="Title About">
      <div class="invalid-feedback">
        {{ $errors->first('title') }}    
    </div> 
    </div>
  </div>

  <div class="form-group ml-5">
    <label for="subject" class="col-sm-2 col-form-label">Slogan</label>
    <div class="col-sm-7">
      <input type="text" name='subject' class="form-control {{$errors->first('subject') ? "is-invalid" : "" }} " value="{{old('subject') ? old('subject') : $about->subject}}" id="link" placeholder="Slogan">
      <div class="invalid-feedback">
        {{ $errors->first('subject') }}    
    </div> 
    </div>
  </div>
    
    <div class="form-group ml-5">
        <label for="desc" class="col-sm-2 col-form-label">Desc</label>
        <div class="col-sm-7">
          <textarea name="desc" cols="30" rows="10" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} " id="summernote">{{old('desc') ? old('desc') : $about->desc}}</textarea>
          <div class="invalid-feedback">
            {{ $errors->first('desc') }}    
        </div> 
        </div>
      
    </div>
      
    <div class="form-group ml-5">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
  </form>
@endsection
