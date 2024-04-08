@extends('layouts.admin')
@section('title', __('Create Preferences'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('preferences.index') }}">{{ __('Preferences') }}</a></li>
        <li class="breadcrumb-item">{{ __('Create Preferences') }}
        </li>
    </ul>
@endsection
@section('content')

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="section-body">
                    <div class="col-md-4 m-auto">
                        <div class="card rounded-card-10px">
                            <div class="card-header">
                                <h5> {{ __('Create Preferences') }}</h5>
                            </div>
                            {!! Form::open(['route' => 'preferences.store', 'method' => 'POST','id'=>'createPreferencesForm']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('preferences_name', __('English Preferences Name'),['class' => 'form-label']) }}
                                    {!! Form::text('preferences_name', null, ['placeholder' => __('English Preferences Name'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('arbic_preferences_name', __('Arabic Preferences Name'),['class' => 'form-label']) }}
                                    {!! Form::text('arbic_preferences_name', null, ['placeholder' => __('Arabic Preferences Name'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <a href="{{ route('preferences.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
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
<script>
    function validateform() {
    var error = 0;

    const formElement = document.getElementById('createPreferencesForm');
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
@endsection

