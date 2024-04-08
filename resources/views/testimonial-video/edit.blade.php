@extends('layouts.admin')

@section('title', __('Edit Testimonial video'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('testimonial-video.index') }}">{{ __('testimonial-video') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit Testimonial video') }}
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
                    <h5> {{ __('Edit testimonial video') }}</h5>
                    {{-- {{($user->title)}} --}}
                </div>
                {{ Form::model($user, ['route' => ['testimonial-video.update', $user->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data','id'=>'editTestVideoForm']) }}
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
                    <div class="form-group col-8">
                        <div class="choose-file d-flex align-items-center gap-2">
                            <div for="avatar" style="width: auto; max-width: 250px;">
                                <label class="form-label">{{ __('Choose thumbnail') }}</label>
                                <input type="file" class="form-control" name="thumbnail" id="thumbnail" data-filename="thumbnail" accept="image/*">
                            </div>
                            <p class="thumbnail">
                                @if (!empty($user['thumbnail']))
                                    <img src="{{ asset($user['thumbnail']) }}" alt="Thumbnail" id="thumbnail1" width="70" height="70"
                                        style="border-radius: 3px; object-fit: cover">
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('link', __('Link '),['class' => 'col-form-label']) }}
                        {!! Form::text('link', null, ['placeholder' => __('Link'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label">testimonial type: </label>
                        <select name="tesimonial_video_type_id" id="tesimonial_video_type_id" class="tesimonial_video_type_id form-control">
                            @foreach($role as $item)
                            <option value="{{ $item->id }}">{{ $item->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end gap-2 px-4 py-1">
                        <a href="{{ route('testimonial-video.index') }}" class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
                        <button type="submit" onclick="return validateform()" class="btn btn-primary mb-0">{{ __('Update') }}</button>
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

    const formElement = document.getElementById('editTestVideoForm');
    const formElements = formElement.querySelectorAll('input, select, textarea');
    const excludedIds = ['thumbnail']; // IDs to exclude from validation
    const thumbnailInput = document.getElementById('thumbnail');
    const thumbnailImage = document.getElementById('thumbnail1');
        if((!thumbnailInput || !thumbnailInput.value) && (!thumbnailImage || !thumbnailImage.src || thumbnailImage.src.trim() === '')){
            alert("Thumbnail image is required.")
            return false;
        }

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
        var confirmMessage = "Do you want to change save?";
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
<script>
    // Function to display the selected thumbnail image
    function displayThumbnail(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function() {
                const thumbnailPreview = document.querySelector('.thumbnail');
                thumbnailPreview.innerHTML = '<img src="' + reader.result + '" alt="Thumbnail">';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Display the existing thumbnail image on page load (for "Edit" action)
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnailInput = document.getElementById('thumbnail');
        const editFlag = thumbnailInput.getAttribute('data-edit');
        if (editFlag === 'true' && thumbnailInput.files.length === 0 && thumbnailInput.getAttribute('data-filename')) {
            displayThumbnail(thumbnailInput);
        }
    });

    // Update the thumbnail image when the user selects a new file (for "Create" action)
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        displayThumbnail(event.target);
    });
</script>

<style>
    .thumbnail img {
        max-width: 200px;
        /* Set the maximum width for the displayed thumbnail */
        max-height: 200px;
        /* Set the maximum height for the displayed thumbnail */
        margin-top: 10px;
        /* Add some margin for spacing */
        border: 1px solid #ccc;
        /* Add a border around the thumbnail */
        border-radius: 5px;
        /* Apply rounded corners to the thumbnail */
    }
</style>@endpush
