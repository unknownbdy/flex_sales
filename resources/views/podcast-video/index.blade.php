@extends('layouts.admin')
@section('title', __('Podcast Videos'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Podcast Videos') }}
        </li>
    </ul>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card  rounded-card-10px">
            <div class="card-body">
                <div class="table-responsive py-5 pb-4 dropdown_2">
                    <div class="container-fluid">
                    {{ $dataTable->table(['width' => '100%']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('style')
    @include('layouts.includes.datatable_css')

@endpush
@push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush