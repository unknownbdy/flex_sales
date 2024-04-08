@extends('layouts.admin')

@section('title', __('Edit instagrsm video link'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('instagram-video.index') }}">{{ __('instagram-video') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit instagram video link') }}
        </li>
    </ul>
@endsection

@section('content')

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="section-body">
            <div class="col-md-4 m-auto">
                <div class="card ">
                    <div class="card-header">
                        <h5> {{ __('Edit instagram video link') }}</h5>
                        {{-- {{($user->title)}} --}}
                    </div>
                    {{ Form::model($user, ['route' => ['instagram-video.updatelink', $user->id]]) }}
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
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('instagram-video.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Update') }}</button>
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
