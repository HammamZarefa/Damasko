@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Comments')</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Client</th>
                        <th>Dish</th>
                        <th>E-mail</th>
                        <th>Stars</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no=0;
                    @endphp
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $comment->client }}</td>
                            <td>{{ $comment->dish->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->stars }}</td>
                            <td>{{ $comment->date }}</td>
                            <td>{{ $comment->status ==1 ? 'Active' : 'Disabled' }}</td>
                            <td>
                                <form method="POST" action="{{route('admin.comment.status', [$comment->id])}}"
                                      class="d-inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="post">
                                    <input type="submit" value="{{ $comment->status ==1 ? 'Disable' : 'Enable' }}" class="{{ $comment->status ==1 ? 'btn btn-danger btn-sm' : 'btn btn-info btn-sm' }}">
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