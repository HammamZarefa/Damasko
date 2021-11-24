@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.pricing.update',$pricing->id) }}" method="POST">
    @csrf

    <div class="container">

        <div class="form-group ml-5">

            <label for="name" class="col-sm-2 col-form-label">Name</label>

            <div class="col-sm-7">

                <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{old('name') ? old('name') : $pricing->name}}" id="name" placeholder="Name">

                <div class="invalid-feedback">
                    {{ $errors->first('name') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="short" class="col-sm-2 col-form-label">Short</label>

            <div class="col-sm-7">

                <input type="text" name='short' class="form-control {{$errors->first('short') ? "is-invalid" : "" }} " value="{{old('short') ? old('short') : $pricing->short}}" id="short" placeholder="short">

                <div class="invalid-feedback">
                    {{ $errors->first('short') }}
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="price" class="col-sm-2 col-form-label">Price</label>

            <div class="col-sm-7">

                <input type="text" name='price' class="form-control {{$errors->first('price') ? "is-invalid" : "" }} " value="{{old('price') ? old('price') : $pricing->price}}" id="price" placeholder="Price">

                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="item" class="col-sm-2 col-form-label">Items</label>

            <div class="col-sm-7">

                <input type="text" name='items' class="form-control {{$errors->first('items') ? "is-invalid" : "" }} " value="{{old('items') ? old('items') : $pricing->items}}" id="items" placeholder="Seperate By Comma ,">

                <div class="invalid-feedback">
                    {{ $errors->first('items') }}
                </div>

            </div>

        </div>
        <div class="form-group ml-5">
   
            <div class="col-sm-3">
   
                <button type="submit" class="btn btn-primary">Update</button>
   
            </div>
   
        </div>

    </div>      

  </form>
@endsection