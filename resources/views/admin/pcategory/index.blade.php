@extends('layouts.admin')

@section('styles')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">Portfolio Categories</h1>     
   
@if (session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<!-- DataTales Example -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <form class="form-inline" action="{{ route('admin.pcategory.store') }}" method="POST">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
              <label for="name" class="sr-only">Name</label>
              <input type="text" name="name" class="form-control {{$errors->first('name') ? "is-invalid" : "" }}" value="{{old('name')}}" id="name" placeholder="Name" required>
              <div class="invalid-feedback">
                {{ $errors->first('name') }}    
            </div> 
            </div>
            <button type="submit" class="btn btn-primary mb-2">Tambah Category</button>
          </form>

    </div>

    <div class="card-body col-md-4">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>

                    <tr>

                        <th>No.</th>

                        <th>Name</th>

                        <th>Option</th>

                    </tr>

                </thead>

                <tbody>

                @php
                
                $no=0;
                
                @endphp
                
                @foreach ($pcategory as $pcategory)
                     
                    <tr> 
             
                        <td>{{ ++$no }}</td>  
                
                        <td>{{ $pcategory->name }}</td> 
                
                        <td>    
                
                            <a href="{{route('admin.pcategory.edit', [$pcategory->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                            <form method="POST" action="{{route('admin.pcategory.destroy', [$pcategory->id])}}" class="d-inline" onsubmit="return confirm('Delete this pcategory permanently?')">
                
                                @csrf
                
                                <input type="hidden" name="_method" value="DELETE">
                
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                
                            </form>
                
                        </td>
            
                    </tr>
            
                    @endforeach
        
                </tbody>
    
            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

@endpush