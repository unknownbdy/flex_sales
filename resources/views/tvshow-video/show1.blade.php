@extends('layouts.admin')
@section('title', __('Tv-show'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tvshow-video.index') }}">{{ __('Tv-Show') }}</a></li>
        <li class="breadcrumb-item">{{ __('Tv-Show') }}
        </li>
    </ul>
@endsection

@section('content')
<div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Tv-Show') }}</h5>
                </div>
            <div class="card-body shoe-boot-tbl">
                <div class="table_respo_cls">
                    <div class="table-responsive">
                        <table id="showBooksIn" class="table table-bordered">
                            <thead>
                                @foreach($data as $row)
                                <tr>
                                    <th>id</th>
                                    <td>{{$row['id']}}</td>
                                </tr>
                                <tr>
                                    <th>Topic English </th>
                                    <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{{$row['topic_english']}}</td>
                                </tr>
                                <tr>
                                    <th>Topic Arabic </th>
                                    <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{{$row['topic_arabic']}}</td>
                                </tr>
                                <tr>
                                    <th>Channel English</th>
                                    <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{{$row['channel_english']}}</td>
                                </tr>
                                <tr>
                                    <th>Channel Arabic</th>
                                    <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{{$row['channel_arabic']}}</td>
                                </tr>
                                <tr>
                                    <th>Show English</th>
                                    <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{{$row['show_english']}}</td>
                                </tr>
                                <tr>
                                    <th>Show Arabic</th>
                                    <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{{$row['show_arabic']}}</td>
                                </tr>
                                <tr>
                                    <th>Tags</th>
                                    <td style="white-space: unset !important;">
                                        @if (!empty($row['tag_id']))
                                            <?php
                                                $tagsIdsArray = explode(',', $row['tag_id']);
                                            ?>
                                            @foreach ($preferences as $preference)
                                                @if (in_array($preference->id, $tagsIdsArray))
                                                    <span class="badge bg-primary">{{ $preference->preferences_name }}
                                                        ({{ $preference->arbic_preferences_name }})</span>
                                                @endif
                                            @endforeach
                                        @else
                                            No Tags.
                                        @endif
                                    </td>
                                </tr>

        <!-- <tr>
            <th>Tag Arabic</th>
            <td>{{$row['tag_arabic']}}</td>
        </tr> -->
        <tr>
            <th>Description</th>
            <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{!!$row['description']!!}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td style="white-space: normal;
    word-break: break-all;
    max-width: 500px;">{!!$row['description_arabic']!!}</td>
        </tr>
        <tr>
         <th>link</th>
        <td><a href="{{$row['link']}}">{{$row['link']}}</td>
         </tr>
         <tr>
         <th>Image</th>
        <td>
            @if ($row['thumbnail'])
            <img src="{{ asset('/' . $row['thumbnail']) }}" alt="Thumbnail" width="100" height="100"
                style="border-radius: 3px;">
            @endif
        </td>
         </tr>
    </thead>
    <tr>

                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            </div>
            <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex alin-items-center justify-content-end px-4 py-1 gap-2">
                    <a class="btn btn-primary" href="{{ route('tvshow-video.index') }}"> Back</a>
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
