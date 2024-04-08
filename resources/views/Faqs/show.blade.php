@extends('layouts.admin')
@section('title', __('FAQs'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">{{ __('FAQs') }}</a></li>
    <li class="breadcrumb-item">{{ __('FAQs') }}
    </li>
</ul>
@endsection

@section('content')
    <div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('FAQs') }}</h5>
                </div>
            <div class="card-body shoe-boot-tbl">
                <table id="showBooksIn" class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 250px;">Title English</th>
                                <td><strong>{{ $faqs->title }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Title Arabic</th>
                                <td><strong>{{ $faqs->title_arabic }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Description English</th>
                                <td><strong>{!! $faqs->description !!}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Description Arabic</th>
                                <td><strong>{!! $faqs->description_arabic !!}</strong></td>
                            </tr>
                        </tbody>
                </table>
                </div>
        <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end gap-2 px-4 py-1">
                    <a class="btn btn-primary" href="{{ route('faqs.index') }}"> Back</a>
                    </div>
</div>
</div>
        </div></div></div>
        @endsection
@push('style')
@include('layouts.includes.datatable_css')

@endpush
{{-- @push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush --}}
