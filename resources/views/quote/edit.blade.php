@extends('layouts.admin')

@section('title', __('Edit Quote'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('quote.index') }}">{{ __('Quote') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit Quote') }}
    </li>
</ul>
@endsection

@section('content')

<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <div class="section-body">
        <div class="col-md-10 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Edit Quote') }}</h5>
                    {{-- {{($quote->title)}} --}}
                </div>
                {{ Form::model($quote, ['route' => ['quote.update', $quote->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data','id'=>'editquotetForm']) }}
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('title', __('Title'),['class' => 'col-form-label']) }}
                        {!! Form::text('title', null, ['placeholder' => __('Title'), 'class' => 'form-control']) !!}
                    </div>




                        <div class="form-group col-12">
                            <label for="tag_id" class="col-form-label">Refrence Podcast</label>
                            <select class="form-control select2" multiple="" name="podcast_id[]" id="podcast_id">
                                @foreach ($podcast as $podcastVal)
                                <?php
                                    $podcast_idArray = explode(',',$quote->podcast_id);
                                    if ($podcast_idArray === null) {
                                        $podcast_idArray = [];
                                    }
                                ?>
                                <option value="{{$podcastVal->id}}" podcastVal="{{ $podcastVal->id }}"
                                    {{ in_array($podcastVal->id, $podcast_idArray) ? 'selected' : '' }}>
                                    {{ $podcastVal->title }} ( {{ $podcastVal->title_arabic }} )
                                </option>
                                @endforeach
                            </select>
                        </div>

                    <!-- <div class="form-group">
                            {{ Form::label('name_arabic', __('Name Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('name_arabic', null, ['placeholder' => __('Name Arabic'), 'class' => 'form-control']) !!}
                        </div>
                    <div class="form-group">
                        {{ Form::label('slug', __('Slug'),['class' => 'col-form-label']) }}
                        {!! Form::text('slug', null, ['placeholder' => __('Slug'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                            {{ Form::label('tag_arabic', __('Tag Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('tag_arabic', null, ['placeholder' => __('Tag Arabic'), 'class' => 'form-control']) !!}
                        </div>
                     <div class="form-group">
                            {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control']) !!}
                        </div>
                    <div class="form-group">
                        {{ Form::label('description', __('Description'),['class' => 'col-form-label']) }}
                        {!! Form::textarea('description', null, ['placeholder' => __('Description'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('video_link', __('Video Link'),['class' => 'col-form-label']) }}
                        {!! Form::text('video_link', null, ['placeholder' => __('Video link here'), 'class' => 'form-control']) !!}
                    </div> -->
                    <div class="form-group">
                        <div class="choose-file">
                            <div for="avatar">
                                <label class="form-label">{{ __('Choose images here') }}</label>
                                <input type="file" class="form-control" name="quot_image" data-filename="profiles" >
                            </div>
                            <p class="images"></p>
                        </div>
                    </div>

                    <div class="form-group col">
                        @if($quote->image)
                        <img src="{{ asset($quote->image) }}" alt="EventPerson Image" width="80"
                            height="80" style="border-radius:3px">
                            <input type="hidden" name="hiddenImage" value="{{ $quote->image }}" />
                        @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex justify-content-end gap-1">
                        <a href="{{ route('quote.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                        <button type="submit" onclick="return validateform()" class="btn btn-primary mb-3">{{ __('Update') }}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- [ sample-quote ] end -->
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

    const formElement = document.getElementById('editquotetForm');
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
