@extends('layouts.admin')
@section('title', __('About'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('about.index') }}">{{ __('About') }}</a></li>
    <li class="breadcrumb-item">{{ __('About') }}
    </li>
</ul>
@endsection

@section('content')
<!-- <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('about.index') }}"> Back</a>
</div> -->
<div class="card rounded-card-10px py-3">
    <div class="card-body">
<table id="showBooksIn" class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>id</th>
            <td>{{$about['id']}}</td>
        </tr>
        <tr>
            <th>title</th>
            <td>{{$about['title']}}</td>
        </tr>
        <tr>
            <th>slug</th>
            <td>{{$about['slug']}}</td>
        </tr>
        <tr>
            <th>content english</th>
            <td style="white-space: normal; word-break: break-all">{!!$about['description']!!}</td>
        </tr>
        <tr>
            <th>content arabic</th>
            <td style="white-space: normal; word-break: break-all">{!!$about['description_arabic']!!}</td>
        </tr>
        <tr>
            <th>Video Link</th>
            <td>{{$about['video_link']}}</td>
        </tr>
        <tr>
            <th>images</th>
            <td>
                @if(!empty($about['media']))
                    @foreach($about['media'] as $image)
                        <img src="{{ asset($image['url']) }}" class="img-responsive" style="height: 150px; width:150px">
                    @endforeach
                @endif
            </td>
        </tr>
    </thead>
</table>
    </div>
</div>
@endsection

@push('style')
@include('layouts.includes.datatable_css')

@endpush
