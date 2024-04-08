@extends('layouts.admin')
@section('title', __('podcast Videos'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('podcast-video.index') }}">{{ __('Podcast video') }}</a></li>
    <li class="breadcrumb-item">{{ __('Podcast Videos') }}
    </li>
</ul>
@endsection

@section('content')
<!-- <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('podcast-video.index') }}"> Back</a>
</div> -->
    <div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Podcast') }}</h5>
                </div>
            <div class="card-body shoe-boot-tbl">
                <table id="showBooksIn" class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 250px;">Teaser English</th>
                                <td><strong>{{ $data->teaser_english }}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Teaser Arabic</th>
                                <td><p>{{ $data->teaser_arabic }}</p></td>
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
                                <td><strong>{!! $data->description_english !!}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Description Arabic</th>
                                <td><strong>{!! $data->description_arabic !!}</strong></td>
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
                <div class="card-header">
                    <h5> {{ __('Episods') }}</h5>
                </div>
                <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 250px;" class="th-sm">Title English </th>
                            <th style="width: 250px;" class="th-sm">Title Arabig </th>
                            <th style="width: 250px;" class="th-sm">Description English </th>
                            <th style="width: 250px;" class="th-sm">Description Arabig </th>
                            <th style="width: 250px;" class="th-sm">Link</th>
                            <th style="width: 250px;" class="th-sm">tag</th>
                            <th style="width: 250px;" class="th-sm">image</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($podcastEpisodes as $episode)
                        <tr>
                            <td class="row-break">{{$episode['title']}}</td>
                            <td class="row-break">{{$episode['title_arabic']}}</td>
                            <td class="row-break">{!!$episode['description']!!}</td>
                            <td class="row-break">{!!$episode['description_arabic']!!}</td>
                            <td class="row-break">{{$episode['link']}}</td>
                            <td class="row-break">
                                @if (!empty($episode['tags']))
                                    <?php
                                        $tagsIdsArray = explode(',', $episode['tags']);
                                    ?>
                                    @foreach ($preferences as $preference)
                                        @if (in_array($preference['id'], $tagsIdsArray))
                                            <span class="badge bg-primary">{{ $preference['preferences_name']}}
                                                ({{ $preference['arbic_preferences_name']}})</span>
                                        @endif
                                    @endforeach
                                @else
                                    No Tags.
                                @endif
                            </td>
                                <td>
                                    @if ( $episode['thumbnail'])
                                    <img src="{{ asset('/' . $episode->thumbnail ) }}" alt="Thumbnail" width="100" height="100"
                                        style="border-radius: 3px;">
                                    @endif
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

        </div>
        <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end gap-2 px-4 py-1">
                    <a class="btn btn-primary" href="{{ route('podcast-video.index') }}"> Back</a>
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
