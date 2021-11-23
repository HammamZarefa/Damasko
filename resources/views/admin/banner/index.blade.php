@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Data Banner</h1>
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
           <a href="{{ route('admin.banner.create') }}" class="btn btn-primary btn-md">Create Banner</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>desc</th>
                    <th>link</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=0;
                    @endphp            
                @foreach ($banner as $banner)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$banner->cover) }}" alt="" height="200px" width="250px">
                    </td>
                    <td>{{ $banner->title }}</td>
                    <td>{{Str::limit( strip_tags( $banner->desc ), 100 )}}</td>
                    <td>{{ $banner->link }}</td>
                    <td>
                        <a href="{{route('admin.banner.edit', [$banner->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                        <form method="POST" action="{{route('admin.banner.destroy', [$banner->id])}}" class="d-inline" onsubmit="return confirm('Delete this banner permanently?')">
            
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

      </div>
      <!-- /.container-fluid -->
@endsection