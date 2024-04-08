@extends('layouts.admin')
@section('title', __('Create Page'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">{{ __('Page') }}</a></li>
        <li class="breadcrumb-item">{{ __('Create Page') }}</li>
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
                                <h5> {{ __('Create Page') }}</h5>
                            </div>
                            {!! Form::open(['route' => 'pages.store', 'method' => 'POST','id'=>'createpageForm']) !!}
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
                                    {{ Form::label('content', __('Content'),['class' => 'col-form-label']) }}
                                    <div class="mb-3">
                                    {!! Form::textarea('content', null, ['placeholder' => __('Content'), 'class' => 'form-control myTextarea']) !!}
                                    </div>
                                    <!-- {!! Form::textarea('content', null, ['placeholder' => __('Content'), 'class' => 'form-control']) !!} -->
                                </div>
                            </div>
                            <div class="card-footer" style="padding: 10px 0px !important;">
                                <div class="d-flex align-items-center justify-content-end gap-2 px-4 py-1">
                                    <a href="{{ route('live-video.index') }}" class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
                                    <button type="submit" onclick="return validateform()" class="btn btn-primary mb-0">{{ __('Save') }}</button>
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

    const formElement = document.getElementById('createpageForm');
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
                // invalidField.focus();
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
    }}
    </script>
@endpush

