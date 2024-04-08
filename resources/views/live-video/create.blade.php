@extends('layouts.admin')
@section('title', __('Create Live Video'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('live-video.index') }}">{{ __('LiveVideo') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create Live Video') }}</li>
</ul>
@endsection

@section('content')

<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Create LiveVideo') }}</h5>
                </div>
                {!! Form::open(['route' => 'live-video.store', 'method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'createLiveVideoForm']) !!}
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-6">
                        {{ Form::label('name_english', __('Name English'),['class' => 'col-form-label']) }}
                        {!! Form::text('name_english', null, ['placeholder' => __('Name Englsih'), 'class' => 'form-control']) !!}
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
                                <option value="{{ $preference->id }}">
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
                    <div class="form-group">
                        <div class="choose-file">
                            <div  for="avatar">
                                <label  class="form-label">{{ __('Choose images here') }}</label>
                                <input type="file" class="form-control" accept="image/*" name="thumbnail" id="thumbnail" data-filename="thumbnail">
                            </div>
                            <p class="thumbnail"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('link', __('Link'),['class' => 'col-form-label']) }}
                        {!! Form::text('link', null, ['placeholder' => __('Link'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Choose Chapter: </label>
                        <select name="chapter_id" id="chapter_id" class="form-control" value="chapter_id">
                            <option disable selected>--select chapter--</option>
                            @foreach($role as $item)
                            <option value="{{ $item->id }}">{{ $item->chapter_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end px-4 py-2 gap-2">
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
</script>
<script>
 function validateform() {
    var error = 0;

    const formElement = document.getElementById('createLiveVideoForm');
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
