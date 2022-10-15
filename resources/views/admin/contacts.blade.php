@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('Dishes')</h1>
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
                        <th>name</th>
                        <th>Email</th>
                        <th width="50%">Message</th>
                        {{--<th>Status</th>--}}
                        {{--<th>Option</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no=0;
                    @endphp
                    @foreach ($contacts as $conatct)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $conatct->name }}</td>
                            <td>{{ $conatct->email }}</td>
                            <td>{{ $conatct->message }}</td>
                            {{--<td>--}}
                                {{--<a href="{{route('dishes.edit', [$dish->id])}}"--}}
                                   {{--class="btn btn-info btn-sm"> Edit </a>--}}
                                {{--<form method="POST" action="{{route('dishes.destroy', [$dish->id])}}"--}}
                                      {{--class="d-inline">--}}
                                    {{--@csrf--}}
                                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                                    {{--<input type="submit" value="{{ $dish->status ==1 ? 'Disable' : 'Enable' }}" class="{{ $dish->status ==1 ? 'btn btn-danger btn-sm' : 'btn btn-info btn-sm' }}">--}}
                                {{--</form>--}}
                            {{--</td>--}}
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