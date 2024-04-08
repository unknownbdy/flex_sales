@extends('layouts.admin')

@section('title', __('Edit Live video'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('live-video.index') }}">{{ __('live-video') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit live video') }}
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
                    <h5> {{ __('Edit live video') }}</h5>
                    {{-- {{($user->title)}} --}}
                </div>
                {{ Form::model($user, ['route' => ['live-video.update', $user->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data','id'=>'editLiveVideoForm']) }}
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-6">
                        {{ Form::label('name_english', __('Name English'),['class' => 'col-form-label']) }}
                        {!! Form::text('name_english', null, ['placeholder' => __('Name English'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('name_arabic', __('Name Arabic'),['class' => 'col-form-label']) }}
                        {!! Form::text('name_arabic', null, ['placeholder' => __('Name Arabic'), 'class' => 'form-control']) !!}
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            {{ Form::label('channel_english', __('Channel English'),['class' => 'col-form-label']) }}
                            {!! Form::text('channel_english', null, ['placeholder' => __('Channel English'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-6">
                            {{ Form::label('channel_arabic', __('Channel Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('channel_arabic', null, ['placeholder' => __('Channel Arabic'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                        <div class="row">
                        <div class="form-group col-6">
                            {{ Form::label('show_english', __('Show English'),['class' => 'col-form-label']) }}
                            {!! Form::text('show_english', null, ['placeholder' => __('Show English'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-6">
                            {{ Form::label('show_arabic', __('Show Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('show_arabic', null, ['placeholder' => __('Show Arabic'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group col-12">
                            <label for="tag_id" class="col-form-label">Tag English & Arabic</label>
                            <select class="form-control select2" multiple="" name="tag_id[]" id="tag_id">
                                @foreach ($preferences as $preference)
                                <?php
                                    $tag_idArray = explode(',',$user->tag_id);
                                    if ($tag_idArray === null) {
                                        $tag_idArray = [];
                                    }
                                ?>
                                <option value="{{$preference->id}}" preference="{{ $preference->id }}"
                                    {{ in_array($preference->id, $tag_idArray) ? 'selected' : '' }}>
                                    {{ $preference->preferences_name }} ( {{ $preference->arbic_preferences_name }} )
                                </option>
                                @endforeach
                            </select>
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
                    <div class="form-group col-4">
                            <div class="d-flex align-items-center">
                                <input type="file" accept="image/*" id="thumbnail" name="thumbnail" placeholder=""
                                    class="form-control" data-edit="false" data-filename="" />

                                <div class="ms-2">
                                    @if ($user->thumbnail)
                                        <img src="{{ asset('/' . $user->thumbnail) }}" id='thumbnail1' alt="Thumbnail" width="50" height="50"
                                            style="border-radius: 3px;">
                                            <input type="hidden" name="hiddenimage" value="{{ $user->thumbnail }}" />
                                    @else
                                    <input type="hidden" name="hiddenimage" value=""/>
                                    @endif
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        {{ Form::label('link', __('Link'),['class' => 'col-form-label']) }}
                        {!! Form::text('link', null, ['placeholder' => __('Link'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Choose Chapter: </label>
                        <select name="chapter_id" style="width: 250px;"  id="chapter_id" class="form-control chapter_id">
                            @foreach($role as $item)
                            <option value="{{ $item->id }}">{{ $item->chapter_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end mx-4 my-2 gap-2">
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

    const formElement = document.getElementById('editLiveVideoForm');
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
