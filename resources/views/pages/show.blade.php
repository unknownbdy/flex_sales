@extends('layouts.admin')
@section('title', __('Pages'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">{{ __('Pages') }}</a></li>
        <li class="breadcrumb-item">{{ __('Pages') }}
        </li>
    </ul>
@endsection

@section('content')
<!-- <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('pages.index') }}"> Back</a>
</div> -->
<div class="card rounded-card-10px mt-1">
    <div class="card-body">
<table id="showBooksIn" class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>id</th>
            <td>{{$page['id']}}</td>
        </tr>
        <tr>
            <th>title</th>
            <td>{{$page['title']}}</td>
        </tr>
        <tr>
            <th>slug</th>
            <td>{{$page['slug']}}</td>
        </tr>
        <tr>
            <th>content</th>
            <td style="white-space: normal; word-break: break-all">{{$page['content']}}</td>
        </tr>
    </thead>
    <tr>
       
    </tr>
</table>
    </div>
</div>


@endsection

@push('style')
    @include('layouts.includes.datatable_css')

@endpush