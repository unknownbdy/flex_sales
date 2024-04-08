@extends('layouts.admin')

@section('title', __('Edit Challenge'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('Challenge.index') }}">{{ __('Challenge') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Challenge') }}
        </li>
    </ul>
@endsection

@section('content')

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="section-body">
            <div class="col-md-12 m-auto">
                <div class="card ">
                    <div class="card-header">
                        <h5> {{ __('Edit Challenge') }}</h5>
                        {{-- {{($user->title)}} --}}
                    </div>
                    {{ Form::model($user, ['route' => ['Challenge.updatelink', $user->id]]) }}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title_english', __('Title English '),['class' => 'col-form-label']) }}
                            {!! Form::text('title_english', null, ['placeholder' => __('Title English'),  'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title_arabic', __('Title Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('title_arabic', null, ['placeholder' => __('Title Arabic'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('video_link', __('Video Link'),['class' => 'col-form-label']) }}
                            {!! Form::text('video_link', null, ['placeholder' => __('Video Link'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('day', __('Day'),['class' => 'col-form-label']) }}
                            {!! Form::number('day', null, ['placeholder' => __('Day'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('point', __('Point'),['class' => 'col-form-label']) }}
                            {!! Form::number('point', null, ['placeholder' => __('Point'), 'class' => 'form-control']) !!}
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('Challenge.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
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
