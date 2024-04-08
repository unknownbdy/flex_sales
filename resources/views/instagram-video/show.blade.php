@extends('layouts.admin')
@section('title', __('Instagram Video '))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('instagram-video.index') }}">{{ __('Instagram Video') }}</a></li>
        <li class="breadcrumb-item">{{ __('Instagram video') }}
        </li>
    </ul>
@endsection

@section('content')
<div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card ">
                <div class="card-header">
                    <h5> {{ __('Course Detail') }}</h5>
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
                            <th>Name</th>
                            <td>{{$row['name']}}</td>
                        </tr>
                        <tr>
                            <th>Name Arabic</th>
                            <td>{{$row['name_arabic']}}</td>
                        </tr>
                        <!-- <tr>
                            <th>Tag English</th>
                            <td style="white-space: normal; word-break: break-all;">{{$row['tag']}}</td>
                        </tr>
                        <tr>
                            <th>Tag Arabic</th>
                            <td style="white-space: normal; word-break: break-all;">{{$row['tag_arabic']}}</td>
                        </tr> -->
                        <tr>
                            <th style="width: 250px;">Tag English</th>
                            <td>
                                <p class="d-flex gap-1 align-items-center flex-wrap">
                                     @if (!empty($row->toArray()))
                                    <?php
                                        $tagsIdsArray = explode(',', $row->toArray()['tag_id']);
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
                                @if (!empty($row->toArray()))
                                <?php
                                    $tagsIdsArray = explode(',', $row->toArray()['tag_id']);
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
                            <th>Description English</th>
                            <td style="white-space: normal; word-break: break-all;">{!!$row['description']!!}</td>
                        </tr>
                        <tr>
                            <th>Description Arabic</th>
                            <td style="white-space: normal; word-break: break-all;">{!!$row['description_arabic']!!}</td>
                        </tr>
                        <tr>
                            <th>Thumbnail</th>
                            <td>
                                <img src="{{ asset($row['thumbnail']) }}" class="img-responsive" style="height: 150px; width:150px">
                            </td>
                        </tr>
                        <tr>
                            <th>link</th>
                            <td style="white-space: normal; word-break: break-all;"><a href="{{$row['link']}}">{{$row['link']}}</a></td>
                        </tr>
                    </thead>
                    @endforeach
                </table>
            </div>
            </div>
</div>
<div class="card-footer">
                    <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('instagram-video.index') }}"> Back</a>
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
