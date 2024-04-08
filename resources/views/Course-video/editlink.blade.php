@extends('layouts.admin')

@section('title', __('Edit Course Video'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('Course-video.index') }}">{{ __('Course-video') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Course Video') }}
        </li>
    </ul>
@endsection

@section('content')

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="section-body">
            <div class="col-md-12 m-auto">
                <div class="card rounded-card-10px">
                    <div class="card-header">
                        <h5> {{ __('Edit Course video') }}</h5>
                        {{-- {{($user->title)}} --}}
                    </div>
                    {{ Form::model($user, ['route' => ['Course-video.updatelink', $user->id]]) }}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('name', __('Name English '),['class' => 'col-form-label']) }}
                            {!! Form::text('name', null, ['placeholder' => __('name_english'),  'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('name_arabic', __('Name Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('name_arabic', null, ['placeholder' => __('Name Arabic'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('link', __('Link'),['class' => 'col-form-label']) }}
                            {!! Form::text('link', null, ['placeholder' => __('Link'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('points', __('Points'),['class' => 'col-form-label']) }}
                            {!! Form::text('points', null, ['placeholder' => __('Points'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Choose Chapter: </label>
                            <!-- <select name="chapter_id" id="chapter_id" class="form-control" value ="chapter_id">
                                @foreach($role as $item)
                                <option value="{{ $item->id }}">{{ $item->name}}</option>
                            @endforeach
                            </select> -->
                            <select name="addmore[0][chapter_id]" id="chapter_id" class="form-control">
                                <option disabled selected>select chapter</option>
                                @foreach($role as $item)
                                    <option value="{{ $item->id }}" {{ $user->chapter_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer" style="padding: 10px 0px !important;">
                        <div class="d-flex align-items-center justify-content-end px-4 py-1 gap-2">
                            <a href="{{ route('Course-video.index') }}" class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary mb-0">{{ __('Update') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
    </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var genericExamples = document.querySelectorAll('[data-trigger]');
            for (i = 0; i < genericExamples.length; ++i) {
                var element = genericExamples[i];
                new Choices(element, {
                    placeholderValue: 'This is a placeholder set in the config',
                    searchPlaceholderValue: 'Select Option',
                });
            }
        });
    </script>
@endpush
