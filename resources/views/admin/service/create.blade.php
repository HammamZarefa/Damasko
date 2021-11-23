@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container">

        <div class="form-group ml-5">

            <label for="icon" class="col-sm-2 col-form-label">Icon</label>

            <div class="col-sm-9">

                <input type="text" name='icon' class="form-control {{$errors->first('icon') ? "is-invalid" : "" }} " value="{{old('icon')}}" id="icon" placeholder="example: icofont-map">

                <div class="invalid-feedback">
                    {{ $errors->first('icon') }}    
                </div>   

            </div>
           
            <a href="https://icofont.com/icons" target="_blank" rel="noopener noreferrer">
           
                <span class="col-sm-2 col-form-label" style="color: blue">https://icofont.com/icons</span>
        
            </a>

        </div>

        <div class="form-group ml-5">

            <label for="title" class="col-sm-2 col-form-label">Title</label>

            <div class="col-sm-9">

                <input type="text" name='title' class="form-control {{$errors->first('title') ? "is-invalid" : "" }} " value="{{old('title')}}" id="title" placeholder="Title">

                <div class="invalid-feedback">
                    {{ $errors->first('title') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="quote" class="col-sm-2 col-form-label">Quote</label>

            <div class="col-sm-9">

                <input type="text" name='quote' class="form-control {{$errors->first('quote') ? "is-invalid" : "" }} " value="{{old('quote')}}" id="quote" placeholder="Quote">

                <div class="invalid-feedback">
                    {{ $errors->first('quote') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="desc" class="col-sm-2 col-form-label">Desc</label>

            <div class="col-sm-9">

                {{-- <input type="text" class="form-control" id="title" placeholder="Title"> --}}

                <textarea name="desc" id="summernote" cols="40" rows="10"  class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} ">{{old('desc')}}</textarea>

                <div class="invalid-feedback">
                    {{ $errors->first('desc') }}    
                </div> 

            </div>   
            
             
   
        </div>
   
        <div class="form-group ml-5">
   
            <div class="col-sm-3">
   
                <button type="submit" class="btn btn-primary">Create</button>
   
            </div>
   
        </div>

    </div>      

  </form>
@endsection
