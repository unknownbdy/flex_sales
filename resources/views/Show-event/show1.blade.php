@extends('layouts.admin')
@section('title', __('Event'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('Show-event.index') }}">{{ __('Event') }}</a></li>
    <li class="breadcrumb-item">{{ __('Event') }}
    </li>
</ul>
@endsection

@section('content')
    <div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Event') }}</h5>
                </div>
            <div class="card-body shoe-boot-tbl">
                <table id="showBooksIn" class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 250px;">Event Title</th>
                                <td><strong>{{ $data->title }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Arabic Event Title</th>
                                <td><p>{{ $data->arabic_title }}</p></td>
                            </tr>
                            <tr>
                            <tr>
                                <th style="width: 250px;">City</th>
                                <td><strong>{{ $data->city }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Arabic City</th>
                                <td><p>{{ $data->arabic_city }}</p></td>
                            </tr>
                            <tr>
                            <tr>
                                <th style="width: 250px;">Location</th>
                                <td><p>{{ $data->location }}</p></td>
                            </tr>
                            <tr>
                            <tr>
                                <th style="width: 250px;">Address</th>
                                <td><strong>{{ $data->address }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Arabic address</th>
                                <td><p>{{ $data->arabic_address }}</p></td>
                            </tr>
                            <tr>
                            <th style="width: 250px;">Tag English</th>
                            <td>
                                <p class="d-flex gap-1 align-items-center flex-wrap">
                                     @if (!empty($data->toArray()))
                                    <?php
                                        $tagsIdsArray = explode(',', $data->toArray()['tag_id']);
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
                                </p></td>
                            </tr>
                            <tr>
                            <th style="width: 250px;">Tag Arabic</th>
                            <td>
                            <p class="d-flex gap-1 align-items-center flex-wrap">
                                @if (!empty($data->toArray()))
                                <?php
                                    $tagsIdsArray = explode(',', $data->toArray()['tag_id']);
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
                                <th style="width: 250px;">Description English</th>
                                <td><strong>{!! $data->description !!}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Description Arabic</th>
                                <td><strong>{!! $data->description_arabic !!}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">From Date</th>
                                <td><strong>{{ $data->from_date }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">To Date</th>
                                <td><strong>{{ $data->to_date }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">From Time</th>
                                <td><strong>{{ $data->from_time }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">To Time</th>
                                <td><strong>{{ $data->to_time }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">image</th>
                                <td>
                                    @if ( $data->thumbnail)
                                    <img src="{{ asset('/' . $data->thumbnail ) }}" alt="Thumbnail" width="100" height="100"
                                        style="border-radius: 3px;">
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                </table>
               @if(!empty(($data->toArray()['eventpeople'])))
                <div class="card-header">
                    <h5> {{ __('Event Details') }}</h5>
                </div>
                <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 250px;" class="th-sm">Type</th>
                            <th style="width: 250px;" class="th-sm">Type Arabic</th>
                            <th style="width: 250px;" class="th-sm">Name</th>
                            <th style="width: 250px;" class="th-sm">Name Arabic</th>
                            <th style="width: 250px;" class="th-sm">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data->eventpeople as $eventpeople)
                        <tr>
                            <td class="row-break">{{$eventpeople['type']}}</td>
                            <td class="row-break">{{$eventpeople['type_arabic']}}</td>
                            <td class="row-break">{{$eventpeople['name']}}</td>
                            <td class="row-break">{{$eventpeople['name_arabic']}}</td>
                                <td>
                                    @if ( $eventpeople->image)
                                    <img src="{{ asset('/' . $eventpeople->image ) }}" alt="Thumbnail" width="100" height="100"
                                        style="border-radius: 3px;">
                                    @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end gap-2 px-4 py-1">
                        <a class="btn btn-primary" href="{{ route('Show-event.index') }}">Back</a>
                    </div>

</div>
        </div></div>




@endsection
@push('style')
@include('layouts.includes.datatable_css')

@endpush
{{-- @push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush --}}
