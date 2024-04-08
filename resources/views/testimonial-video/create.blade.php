@extends('layouts.admin')
@section('title', __('Create Testimonial Video'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('testimonial-video.index') }}">{{ __('TestimonialVideo') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create Testimonial Video') }}</li>
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
                    <h5> {{ __('Create Testimonial Video') }}</h5>
                </div>
                {!! Form::open(['route' => 'testimonial-video.store', 'method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'createTestVideoForm']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('name', __('Name'),['class' => 'col-form-label']) }}
                        {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('name_arabic', __('Name Arabic'),['class' => 'col-form-label']) }}
                        {!! Form::text('name_arabic', null, ['placeholder' => __('Name Arabic'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('designation', __('Designation'),['class' => 'col-form-label']) }}
                        {!! Form::text('designation', null, ['placeholder' => __('Designation'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                            {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control myTextarea']) !!}
                        </div>
                        <!-- {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control']) !!} -->
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', __('Description English '),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                            {!! Form::textarea('description', null, ['placeholder' => __('Description English'), 'class' => 'form-control myTextarea']) !!}
                        </div>
                        <!-- {!! Form::textarea('description', null, ['placeholder' => __('Description'), 'class' => 'form-control']) !!} -->
                    </div>
                    <div class="form-group">
                        <div class="choose-file">
                            <div for="avatar">
                                <label for="thumbnail" class="form-label">{{ __('Choose thumbnail') }}</label>
                                <input type="file" class="form-control" name="thumbnail" id="thumbnail" data-filename="thumbnail" accept="image/*">
                            </div>
                            <p class="thumbnail"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('link', __('Link '),['class' => 'col-form-label']) }}
                        {!! Form::text('link', null, ['placeholder' => __('Link'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label class="form-label">testimonial type: </label>
                        <select name="tesimonial_video_type_id" id="tesimonial_video_type_id" class="tesimonial_video_type_id form-control">
                            <option disable selected>--select Type--</option>
                            @foreach($role as $item)
                            <option value="{{ $item->id }}">{{ $item->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end my-1 px-4 gap-2">
                        <a href="{{ route('testimonial-video.index') }}" class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
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
</script>
<script>
  function validateform() {
    var error = 0;
    const formElement = document.getElementById('createTestVideoForm');
    const formElements = formElement.querySelectorAll('input, select, textarea');
    formElements.forEach(element => {
        const id = element.id;
        if (!id.startsWith('note-dialog')) {
            const value = element.value;
            if ((value == "" || value == 0) && id != "") {

                // var Label = document.querySelector("label[for='"+id+"']");
                // Label.style.color = 'red';
                var invalidField = document.getElementById(id);
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
