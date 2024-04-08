@extends('layouts.admin')
@section('title', __('Testimonial Videos'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('testimonial-video.index') }}">{{ __('Testimonial video') }}</a></li>
        <li class="breadcrumb-item">{{ __('Testimonial Videos') }}
        </li>
    </ul>
@endsection

@section('content')
<!-- <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('testimonial-video.index') }}"> Back</a>
</div> -->
<div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Testimonial Videos') }}</h5>
                </div>
            <div class="card-body shoe-boot-tbl">
<table id="showBooksIn" class="table table-bordered">
    <thead>
        @foreach($data as $row)
        <tr>
            <th>id</th>
            <td>{{$row['id']}}</td>
        </tr>
        <tr>
            <th>Name English </th>
            <td>{{$row['name']}}</td>
        </tr>
        <tr>
            <th>Name Arabic </th>
            <td>{{$row['name_arabic']}}</td>
        </tr>
        <tr>
            <th>Designation</th>
            <td>{{$row['designation']}}</td>
        </tr>
        <tr>
            <th>Description Arabic</th>
            <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{!!$row['description_arabic']!!}</td>
        </tr>
        <tr>
            <th>Description English</th>
            <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{!!$row['description']!!}</td>
        </tr>
        <tr>
            <th>Thumbnail</th>
            <td>
                <img src="{{ asset($row['thumbnail']) }}" class="img-responsive" style="height: 150px; width:150px">
            </td>
        </tr>
        <tr>
            <th>type</th>
            <td>@if ($row['testimonial_video_type_id'] == 1)
                audio
                @else
                video
                @endif
            </td>
        </tr>
        <tr>
                <th>link</th>
                <td><div style="word-break: break-all;
    white-space: normal;"><a href="{{$row['link']}}">{{$row['link']}}</a></div></td>
         </tr>
    </thead>
    <tr>

    </tr>
    @endforeach
</table>
</div>
            <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end mx-4 my-1 gap-2">
                    <a class="btn btn-primary" href="{{ route('testimonial-video.index') }}"> Back</a>
                    </div>
                </div>
        </div></div></div></div>


@endsection

@push('style')
    @include('layouts.includes.datatable_css')

@endpush
{{-- @push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush --}}
