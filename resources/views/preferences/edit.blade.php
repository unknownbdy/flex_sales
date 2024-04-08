@extends('layouts.admin')
@section('title', __('Edit Preferences'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('preferences.index') }}">{{ __('Preferences') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Role') }}
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
                        <h5> {{ __('Edit User') }}</h5>
                    </div>
                    {!! Form::model($preference, ['method' => 'PATCH', 'route' => ['preferences.update', $preference->id],'id'=>'editPreferencesForm']) !!}

                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('preferences_name', __('English Preferences name'), ['class' => 'form-label']) }}
                            {!! Form::text('preferences_name', null, ['placeholder' => __('English Preferences name'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('arbic_preferences_name', __('Arabic Preferences Name'), ['class' => 'form-label']) }}
                            {!! Form::text('arbic_preferences_name', null, ['placeholder' => __('Arabic Preferences name'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="card-footer" style="padding: 10px 0px !important;">
                        <div class="d-flex align-items-center justify-content-end px-4 py-1 gap-2">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
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
    <script>
    function validateform() {
    var error = 0;

    const formElement = document.getElementById('editPreferencesForm');
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

