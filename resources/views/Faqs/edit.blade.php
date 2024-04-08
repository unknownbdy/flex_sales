@extends('layouts.admin')

@section('title', __('Edit FAQs video'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('podcast-video.index') }}">{{ __('FAQs-video') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit FAQs video') }}
    </li>
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
                    <h5> {{ __('Edit FAQs video') }}</h5>
                    {{-- {{($user->title)}} --}}
                </div>
                {{ Form::model($faqs, ['route' => ['faqs.update', $faqs->id], 'method' => 'PUT' ,'enctype' => 'multipart/form-data', 'id'=> 'editfaqsForm']) }}
                    <div class="card-body">
                    <div class="row">
                        <div class="form-group col-12">
                            {{ Form::label('title', __('FAQs Name English'),['class' => 'col-form-label']) }}
                            {!! Form::text('title',NULL, ['placeholder' => __('FAQs Name English'), 'class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('title_arabic', __('FAQs Name Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('title_arabic', NULL, ['placeholder' => __('FAQs Name Arabic'), 'class' =>
                            'form-control']) !!}
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('description', __('Description English'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description', NULL, ['placeholder' => __('Description
                                English'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description_english', null, ['placeholder' => __('Description English'), 'class' => 'form-control']) !!} -->
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description_arabic', NULL, ['placeholder' => __('Description
                                Arabic'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control']) !!} -->
                        </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <a href="{{ route('faqs.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                                    <button type="submit" onclick="return validateform()" class="btn btn-primary mb-3">{{ __('Update') }}</button>
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
    <script>
    function validateform() {
    var error = 0;

    const formElement = document.getElementById('editfaqsForm');
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
    }}
</script>
@endsection

