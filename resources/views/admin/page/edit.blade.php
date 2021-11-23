@extends('layouts.admin')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.page.update', $page->id) }}" method="POST">
    @csrf

    <div class="container">

        <div class="form-group ml-2">

            <label for="title" class="col-sm-2 col-form-label">Title</label>

            <div class="col-sm-10">

                <input type="text" name='title' class="form-control {{$errors->first('title') ? "is-invalid" : "" }} " value="{{old('title') ? old('title') : $page->title}}" id="title" placeholder="Title">

                <div class="invalid-feedback">
                    {{ $errors->first('title') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-2">

            <label for="text" class="col-sm-2 col-form-label">Text</label>

            <div class="col-sm-10">

                <textarea name="text" class="form-control {{$errors->first('text') ? "is-invalid" : "" }} "  id="summernote" cols="30" rows="10">{{old('text') ? old('text') : $page->text}}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('text') }}    
                </div>   

            </div>

        </div>
   
        <div class="form-group ml-2">
   
            <div class="col-sm-3">
   
                <button type="submit" class="btn btn-primary">Update</button>
   
            </div>
   
        </div>

    </div>      

  </form>
@endsection