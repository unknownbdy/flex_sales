@extends('layouts.admin')
@section('title', __('Create Quote'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('quote.index') }}">{{ __('Quote') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create Quote') }}</li>
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
                    <h5> {{ __('Create Quote') }}</h5>
                </div>
                {!! Form::open(['route' => 'quote.store', 'method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'quotetForm']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('title', __('Title'),['class' => 'col-form-label']) }}
                        {!! Form::text('title', null, ['placeholder' => __('Title'), 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-12">
                            <label for="podcast_id" class="col-form-label">Refrence Podcast</label>
                            <select class="form-control select2" multiple="" name="podcast_id[]" id="podcast_id">
                                @foreach ($podcast as $podcastVal)
                                <option value="{{ $podcastVal->id }}">
                                    {{ $podcastVal->title }} ( {{ $podcastVal->title_arabic }} )
                                </option>
                                @endforeach
                            </select>
                        </div>

                    <div class="form-group">
                        <div class="choose-file">
                            <div for="avatar">
                                <label for="quote_image" class="form-label">{{ __('Choose images here') }}</label>
                                <input type="file" class="form-control" id="quote_image" name="image" data-filename="profiles">
                            </div>
                            <p class="images"></p>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('quote.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
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


    // function validate_form()
    // {
    //     var Image = $('#quote_image').val();
    //     var podcast_id = $('#podcast_id').val();

    //     if(podcast_id=='')
    //     {
    //         alert('Please select refrence podcast');
    //         $('.select2-selection').css('border-color','red');
    //         return false;
    //     }

    //     if(Image==''){
    //         alert('Please uplaod image');
    //         $('#quote_image').css('border-color','red');
    //         return false;
    //     }
    // }
</script>
<script>
    function validateform() {
    var error = 0;

    const formElement = document.getElementById('quotetForm');
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
