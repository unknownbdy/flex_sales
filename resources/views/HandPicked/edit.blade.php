@extends('layouts.admin')

@section('title', __('Edit Articals'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('HandPicked.index') }}">{{ __('Articals') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Articals') }}
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
                        <h5> {{ __('Edit Articals') }}</h5>
                        {{-- {{($user->title)}} --}}
                    </div>
                    {{ Form::model($user, ['route' => ['HandPicked.update', $user->id],'enctype' => 'multipart/form-data', 'method' => 'PUT','id'=>'editArticleForm']) }}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title_english', __('Title English'),['class' => 'col-form-label']) }}
                            {!! Form::text('title_english', null, ['placeholder' => __('Name Englsih'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title_arabic', __('Title Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('title_arabic', null, ['placeholder' => __('Title Arabic'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control']) !!} -->
                        </div>
                        <div class="form-group">
                            {{ Form::label('description_english', __('Description English'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description_english', null, ['placeholder' => __('Description English'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description_english', null, ['placeholder' => __('Description English'), 'class' => 'form-control']) !!} -->
                      </div>
                      <div class="form-group">
                                    {{ Form::label('short_description_english', __('Short Description English'), ['class' => 'col-form-label']) }}
                                    <div class="mb-3">
                                        {!! Form::textarea('short_description_english', null, ['placeholder' => __(), 'class' => 'form-control', 'style' => 'height: 150px;']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('short_description_arabic', __('Short Description Arabic'), ['class' => 'col-form-label']) }}
                                    <div class="mb-3">
                                        {!! Form::textarea('short_description_arabic', null, ['placeholder' => __(), 'class' => 'form-control', 'style' => 'height: 150px;']) !!}
                                    </div>
                                </div>
                      <div class="form-group">
                            <label class="col-form-label">Preferences</label>
                            <select id="multiSelectDropdown" name="tag_id[]" multiple class="form-control select2">
                                <option value="">Select Preference(s)</option>
                                @foreach ($preferences as $preference)
                                    <?php
                                    $tagsIdsArray = explode(',',$user->tag_id);
                                    if ($tagsIdsArray === null) {
                                        $tagsIdsArray = [];
                                    }
                                    ?>
                                    <option value="{{ $preference->id }}"
                                        {{ in_array($preference->id, $tagsIdsArray) ? 'selected' : '' }}>
                                        {{ $preference->preferences_name }}{{ $preference->arbic_preferences_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                          <!-- <div class="form-group">
                            {{ Form::label('image', __('Image'),['class' => 'col-form-label']) }}
                            {!! Form::file('image', null, ['placeholder' => __('Image'), 'class' => 'form-control']) !!}
                        </div> -->
                         <!-- <div class="form-group">
                            <div class="choose-file">
                                 <div for="images">
                                        <label class="col-form-label">{{ __('Choose file here') }}</label>
                                        <input type="file" class="form-control" name="thumbnail" value="image" data-filename="image">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group col-8">
                            <div class="choose-file d-flex align-items-center">
                                <div for="avatar" style="width: 50%">
                                    <label class="col-form-label">{{ __('Choose Article Image') }}</label>
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                                        data-filename="thumbnail" data-edit="{{ isset($user) ? 'true' : 'false' }}"
                                        style="width: 70%"  accept="image/*">
                                </div>
                                <p class="thumbnail ms-4 mb-0">
                                    @if(isset($user) && $user->image)
                                    <img class="alerMessage" src="{{ asset($user->image) }}" alt="Thumbnail" id="thumbnail1" width="70" height="70"
                                        style="border-radius: 3px; object-fit: cover">
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="padding: 10px 0px !important">
                        <div class="d-flex align-items-center justify-content-end gap-2 px-4 py-1">
                            <a href="{{ route('live-video.index') }}" class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
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

    const formElement = document.getElementById('editArticleForm');
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

@endpush
