@extends('layouts.admin')

@section('styles')
<style>
   .picture-container {
  position: relative;
  cursor: pointer;
  text-align: center;
}
 .picture {
  width: 800px;
  height: 400px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  /* border-radius: 50%; */
  margin: 5px auto;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
}
.picture:hover {
  border-color: #2ca8ff;
}
.picture input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
.picture-src {
  width: 100%;
  height: 100%;
}
</style>
@endsection
@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('dishes.update',$dish->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="container">
        <div class="form-group">
            <div class="picture-container">
                <div class="picture">
                    <img src="{{ asset('storage/'.$dish->cover) }}" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>
                    <input type="file" id="wizard-picture" name="cover" class="form-control {{$errors->first('cover') ? "is-invalid" : "" }} ">
                    <div class="invalid-feedback">
                        {{ $errors->first('cover') }}    
                    </div>
                </div>
                <h6>Upload Cover</h6>
            </div>
        </div>
        <div class="form-group ml-5">
            <label for="name" class="col-sm-2 col-form-label">English Name</label>
            <div class="col-sm-9">
                <input type="text" name='name[en]' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{$dish->getTranslation('name','en')}}" id="name_en" placeholder="Dish Name">
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            </div>
        </div>
        <div class="form-group ml-5">
            <label for="name" class="col-sm-2 col-form-label">Finland Name</label>
            <div class="col-sm-9">
                <input type="text" name='name[fi]' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{$dish->getTranslation('name','fi')}}" id="name_fi" placeholder="Dish Name">
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            </div>
        </div>
        <div class="form-group ml-5">
            <label for="client" class="col-sm-2 col-form-label">English Summary</label>
            <div class="col-sm-9">
                <input type="text" name='summary[en]' class="form-control {{$errors->first('summary') ? "is-invalid" : "" }} " value="{{$dish->getTranslation('summary','en')}}" id="summary_en" placeholder="summary">
                <div class="invalid-feedback">
                    {{ $errors->first('summary') }}
                </div>
            </div>
        </div>
        <div class="form-group ml-5">
            <label for="client" class="col-sm-2 col-form-label">Finland Summary</label>
            <div class="col-sm-9">
                <input type="text" name='summary[fi]' class="form-control {{$errors->first('summary') ? "is-invalid" : "" }} " value="{{$dish->getTranslation('summary','fi')}}" id="summary" placeholder="summary">
                <div class="invalid-feedback">
                    {{ $errors->first('summary') }}
                </div>
            </div>
        </div>

        <div class="form-group ml-5">
            <label for="client" class="col-sm-2 col-form-label">English Keywords</label>
            <div class="col-sm-9">
                <input type="text" name='keywords[en]' class="form-control {{$errors->first('keywords') ? "is-invalid" : "" }} " value="{{$dish->getTranslation('keywords','en')}}" id="keywords_en" placeholder="keywords">
                <div class="invalid-feedback">
                    {{ $errors->first('keywords') }}
                </div>
            </div>
        </div>
        <div class="form-group ml-5">
            <label for="client" class="col-sm-2 col-form-label">Finland Keywords</label>
            <div class="col-sm-9">
                <input type="text" name='keywords[fi]' class="form-control {{$errors->first('keywords') ? "is-invalid" : "" }} " value="{{$dish->getTranslation('keywords','fi')}}" id="keywords" placeholder="keywords">
                <div class="invalid-feedback">
                    {{ $errors->first('keywords') }}
                </div>
            </div>
        </div>

        <div class="form-group ml-5">
            <label for="desc" class="col-sm-2 col-form-label">English Description</label>
            <div class="col-sm-9">
                <textarea name="desc[en]" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} summernote "  id="summernote_en" cols="30" rows="10">{{$dish->getTranslation('desc','en')}}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('desc') }}
                </div>
            </div>
        </div>
        <div class="form-group ml-5">
            <label for="desc" class="col-sm-2 col-form-label">Finland Description</label>
            <div class="col-sm-9">
                <textarea name="desc[fi]" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} summernote "  id="summernote" cols="30" rows="10">{{$dish->getTranslation('desc','fi')}}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('desc') }}
                </div>
            </div>
        </div>
        <div class="form-group ml-5">
            Status : <input type="checkbox" name="status" value="1" {{$dish->status==1? 'checked':''}} >
        </div>
        <div class="form-group ml-5">
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
  </form>
@endsection

@push('scripts')

<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
      readURL(this);
  });
  //Function to show image before upload
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
      }
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush