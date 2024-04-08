@extends('layouts.admin')
@section('title', __('Preferences'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('preferences.index') }}">{{ __('Preferences') }}</a></li>
        <li class="breadcrumb-item">{{ __('Preferences') }}
        </li>
    </ul>
@endsection

@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('preferences.index') }}"> Back</a>
</div>
<table id="showBooksIn" class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <td>{{$preference['id']}}</td>
        </tr>
        <tr>
            <th>title</th>
            <td>{{$preference['preferences_name']}}</td>
        </tr>
    </thead>
    <tr>

    </tr>
</table>


@endsection

@push('style')
    @include('layouts.includes.datatable_css')

@endpush
