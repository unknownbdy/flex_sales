@extends('layouts.admin')
@section('title', __('Create About'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('about.index') }}">{{ __('About') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create About') }}</li>
</ul>
@endsection

@section('content')

<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <div class="section-body">
        <div class="col-md-10 m-auto">
            <div class="card rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Create About') }}</h5>
                </div>
                {!! Form::open(['route' => 'about.store', 'method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'createAboutForm']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('title', __('Title'),['class' => 'col-form-label']) }}
                        {!! Form::text('title', null, ['placeholder' => __('Title'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('slug', __('Slug'),['class' => 'col-form-label']) }}
                        {!! Form::text('slug', null, ['placeholder' => __('Slug'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', __('Description English'),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                        {!! Form::textarea('description', null, ['placeholder' => __('Description English'), 'class' => 'form-control myTextarea' ]) !!}
                        </div>
                        <!-- {!! Form::textarea('description', null, ['placeholder' => __('Description'), 'class' => 'form-control']) !!} -->
                    </div>
                    <div class="form-group">
                        {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                        {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control myTextarea' ]) !!}
                        </div>
                        <!-- {!! Form::textarea('description', null, ['placeholder' => __('Description'), 'class' => 'form-control']) !!} -->
                    </div>
                    <div class="form-group">
                        {{ Form::label('video_link', __('Video Link'),['class' => 'col-form-label']) }}
                        {!! Form::text('video_link', null, ['placeholder' => __('Video link here'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <div class="choose-file">
                            <div for="avatar">
                                <label class="form-label">{{ __('Choose images here') }}</label>
                                <input type="file" class="form-control" name="images[]" data-filename="profiles" multiple>
                            </div>
                            <p class="images"></p>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('about.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                        <button type="submit" onclick="return validateform()" class="btn btn-primary mb-3">{{ __('Save') }}</button>
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
    function validateform() {
    var error = 0;

    const formElement = document.getElementById('createAboutForm');
    const formElements = formElement.querySelectorAll('input, select, textarea');
    const excludedIds = ['thumbnail']; // IDs to exclude from validation

    formElements.forEach(element => {
        const id = element.id;
        if (!id.startsWith('note-dialog')) {
            const value = element.value;
            if ((value == "" || value == 0) && id != "" && !excludedIds.includes(element.id)) {
                var Label = document.querySelector("label[for='"+id+"']");
                Label.style.color = 'red';
                var invalidField = document.getElementById(id);
                // // invalidField.focus();
                invalidField.style.border = '1px solid red';
                error = 1;
            }
        }
    });
    if (error == 1) {
        alert('Please fill out all required fields.');
        return false;
    } else {
        var confirmMessage = "Do you want to save?";
        if (confirm(confirmMessage)) {
            // User wants to save, you can proceed with submission or other actions
            return true;
        } else {
            // User doesn't want to save, prevent form submission
            return false;
        }
    }
}
</script>
@endpush
