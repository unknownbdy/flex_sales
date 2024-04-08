@extends('layouts.admin')
@section('title', __('Articals'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('HandPicked.index') }}">{{ __('Articals') }}</a></li>
        <li class="breadcrumb-item">{{ __('Show') }}</li>
    </ul>
@endsection

@section('content')
<!-- <div class="table-responsive"> -->
<div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Articals') }}</h5>
                </div>
            <div class="card-body shoe-boot-tbl">
                <table id="showBooksIn" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 250px;">ID</th>
                        <td>{{ $handPicked->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 250px;">Name English</th>
                        <td>{{ $handPicked->title_english }}</td>
                    </tr>
                    <tr>
                        <th style="width: 250px;">Name Arabic</th>
                        <td>{{ $handPicked->title_arabic }}</td>
                    </tr>
                    <tr>
                        <th style="width: 250px;">Description English</th>
                        <td style="white-space: break-spaces;">{!! $handPicked->description_english !!}</td>
                    </tr>
                    <tr>
                        <th style="width: 250px;">Description Arabic</th>
                        <td style="white-space: break-spaces;">{!! $handPicked->description_arabic !!}</td>
                    </tr>
                    <tr>
                        <th style="width: 250px;">Short Description English</th>
                        <td style="white-space: break-spaces;">{{ $handPicked->short_description_english }}</td>
                    </tr>
                    <tr>
                        <th style="width: 250px;">Short Description Arabic</th>
                        <td style="white-space: break-spaces;">{{ $handPicked->short_description_arabic }}</td>
                    </tr>
                    <!-- Add more fields as needed -->
                    <tr>
                    <th style="width: 250px;">Tag English</th>
                    <td>
                    <p class="d-flex gap-1 align-items-center flex-wrap">
                        @if (!empty($handPicked->toArray()))
                        <?php
                            $tagsIdsArray = explode(',', $handPicked->toArray()['tag_id']);
                        ?>
                        @foreach ($preferences as $preference)

                        @if (in_array($preference['id'], $tagsIdsArray))
                                <span class="badge bg-primary">
                                    {{ $preference['preferences_name'] }},</span>
                            @endif

                        @endforeach
                        @else
                        No Tags.
                        @endif
                        </p>
                    </td>
                        </tr>
                    <tr>
                    <th style="width: 250px;">Tag Arabic</th>
                    <td>
                    <p class="d-flex gap-1 align-items-center flex-wrap">
                        @if (!empty($handPicked->toArray()))
                        <?php
                            $tagsIdsArray = explode(',', $handPicked->toArray()['tag_id']);
                        ?>
                        @foreach ($preferences as $preference)

                        @if (in_array($preference['id'], $tagsIdsArray))
                                <span class="badge bg-primary">
                                    {{ $preference['arbic_preferences_name'] }},</span>
                            @endif

                        @endforeach
                        @else
                        No Tags.
                        @endif
                        </p>
                    </td>
                        </tr>
                        <tr>
                        <th style="width: 250px;">Image</th>
                        <td>
                            @if ( $handPicked['image'])
                            <img src="{{ asset('/' . $handPicked->image ) }}" alt="Thumbnail" width="100" height="100"
                                style="border-radius: 3px;">
                            @endif
                        </td>
                        </tr>
                </thead>
            </table>
            </div>
            <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end gap-2 px-4 py-1">
                    <a class="btn btn-primary" href="{{ route('HandPicked.index') }}"> Back</a>
                    </div>
                </div></div>
</div>
        </div>
        </div>
    </div>
<!-- </div> -->
@endsection

@push('style')
    @include('layouts.includes.datatable_css')

@endpush
{{-- @push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush --}}
