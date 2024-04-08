@extends('layouts.admin')
@section('title', __('Instagram Videos'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('instagram-video.index') }}">{{ __('Instagram video') }}</a></li>
        <li class="breadcrumb-item">{{ __('Instagram Videos') }}
        </li>
    </ul>
@endsection

@section('content')
<!-- <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('instagram-video.index') }}"> Back</a>
</div> -->
<div class="card py-3 my-2  rounded-card-10px">
    <div class="card-body">
        <div class="table_respo_cls">
            <div class="table-responsive">
                <table id="showBooksIn" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name Englsih</th>
                            <th>Name Arabic</th>
                            <th>link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row['id']}}</td>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['name_arabic']}}</td>
                        <td><a href="{{$row['link']}}">{{ Str::limit($row['link'], 30) }}</a></td>
                    <td> <a href="{{ route('instagram-video.editlink' , ['id' => $row['id']]) }}"  class="btn btn-primary">edit</a></div>
                        <a href="{{ route('instgram-video.destroy' , ['id' => $row['id']]) }}"  class="btn btn-danger"onclick="return confirm('Are you sure you want to delete this item?');">delete</a>
                            </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<div class="d-flex my-3 justify-content-end">
{{ $data->links('pagination::bootstrap-4') }}
</div>

@endsection

@push('style')
    @include('layouts.includes.datatable_css')

@endpush
{{-- @push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush --}}