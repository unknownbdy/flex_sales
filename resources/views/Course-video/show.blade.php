@extends('layouts.admin')
@section('title', __('Courses'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('Course-video.index') }}">{{ __('Course') }}</a></li>
    <li class="breadcrumb-item">{{ __('Courses') }}
    </li>
</ul>
@endsection

@section('content')
<div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Course Detail') }}</h5>
                </div>
            <div class="card-body shoe-boot-tbl">
<table id="showBooksIn" class="table table-bordered">
    <tbody>
        <tr>
            <th style="width: 250px;">id</th>
            <td>{{ $course->id }}</td>
        </tr>
        <tr>
            <th>Course Name</th>
            <td>{{$course->course_name}}</td>
        </tr>
        <tr>
            <th>Course Name Arabic</th>
            <td>{{$course->course_name_arabic}}</td>
        </tr>
        <!-- <tr>
            <th>Tag English</th>
            <td>{{$course->tag}}</td>
        </tr>
        <tr>
            <th>Tag Arabic</th>
            <td>{{$course->tag_arabic}}</td>
        </tr> -->
        <tr>
            <th>Description English</th>
            <td>{!!$course->description!!}</td>
        </tr>
        <tr>
            <th>Description Arabic</th>
            <td>{!!$course->description_arabic!!}</td>
        </tr>
        <!-- <tr>
            <th>Thumbnail</th>
            <td>
                <img src="{{ asset($course->thumbnail) }}" class="img-responsive" style="height: 150px; width:150px">
            </td>
        </tr> -->
        <tr>
            <th>Listing Price</th>
            <td>{{$course->price}}</td>
        </tr>
        <tr>
            <th>Actual Price</th>
            <td>{{$course->actual_price}}</td>
        </tr>
        <tr>
            <th>Tags</th>
            <td style="white-space: unset !important;">
            @if ($preferences->count() > 0)
                @foreach ($preferences as $preference)
                <span class="badge bg-primary">{{ $preference->preferences_name }}
                        ({{ $preference->arbic_preferences_name }})</span>
                @endforeach

            @else
                No Tags.
            @endif
            </td>
        </tr>
        <tr>
            <th>References Course</th>
            <td style="white-space: unset !important;">
            @if ($references->count() > 0)
                @foreach ($references as $reference)
                <span class="badge bg-primary">{{ $reference->course_name }}
                        ({{ $reference->course_name_arabic }})</span>
                @endforeach

            @else
                No References.
            @endif
            </td>
        </tr>

    </tbody>
</table>
<!-- </div> -->
            <!-- <div class="card-footer">
                    <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('Course-video.index') }}"> Back</a>
                    </div>
                </div> -->
        <!-- </div></div></div></div> -->
<div class="table_respo_cls">
    <div class="table-responsive">
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

    <thead>
        <tr>
            <th class="th-sm">SR.No.</th>
            <th class="th-sm">Name Englsih</th>
            <th class="th-sm">Name Arabic</th>
            <th class="th-sm">chapter</th>
            <th class="th-sm">link</th>
            <!-- <th class="th-sm">Action</th> -->
        </tr>
    </thead>
    @php
        $serialNumber = ($data->currentPage() - 1) * $data->perPage();
    @endphp
    @foreach($data as $row)
    <tr>

        <td>{{++$serialNumber }}</td>
        <td>{{ Str::limit($row['name'], 30) }}</td>
        <td>{{$row['name_arabic']}}</td>
        <td style="white-space: unset;">@if ($row['chapter_id']==1)
            chapter one
            @elseif  ($row['chapter_id']==2)
            chapter two
            @elseif  ($row['chapter_id']==3)
            Chapter Three
            @elseif  ($row['chapter_id']==4)
            chapter  four
            @elseif  ($row['chapter_id']==5)
            Chapter Five
            @elseif  ($row['chapter_id']==6)
            chapter Six
            @elseif  ($row['chapter_id']==7)
            Chapter seven
            @elseif  ($row['chapter_id']==8)
            Chapter Eight
            @elseif  ($row['chapter_id']==9)
            chapter nine
            @elseif  ($row['chapter_id']==10)
            Chapter Ten
        @endif
        <td style="white-space: nowrap;"><a href="{{$row['link']}}">{{ Str::limit($row['link'], 30) }}</a></td>
       <!-- <td>
       <div style="display: flex;width: 155px;">
       <a href="{{ route('Course-video.editlink' , ['id' => $row['id']]) }}"  class="btn btn-primary">edit</a>
        <a href="{{ route('Course-video.destroy-custom' , ['id' => $row['id']]) }}"  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">delete</a>
</div>
    </td> -->
    </tr>
    @endforeach
</table>
    </div>
</div>

</div>
<div class="d-flex justify-content-end px-4 py-1">{{ $data->links('pagination::bootstrap-4') }}</div>
            <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end gap-2 px-4 py-1">
                    <a class="btn btn-primary" href="{{ route('Course-video.index') }}"> Back</a>
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
