@extends('layouts.admin')

@section('title', __('Edit Event'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('Show-event.index') }}">{{ __('Event') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit Event') }}
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
                    <h5> {{ __('Edit Event') }}</h5>

                </div>
                {{ Form::model($event, ['route' => ['Show-event.update', $event->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data','id' => 'editEventForm'])}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            {{ Form::label('title', __('Event Title'),['class' => 'col-form-label']) }}
                            {!! Form::text('title', null, ['placeholder' => __('Event Title'), 'class' =>
                            'form-control']) !!}
                        </div>
                        <div class="form-group col-6">
                        {{ Form::label('arabic_title', __('Arabic Event Title'),['class' => 'col-form-label']) }}
                        {!! Form::text('arabic_title', null, ['placeholder' => __('Arabic Event Title'), 'class' => 'form-control', 'reqired']) !!}
                        </div>
                        <div class="form-group col-6">
                            {{ Form::label('city', __('City'),['class' => 'col-form-label']) }}
                            {!! Form::text('city', null, ['placeholder' => __('City'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-6">
                        {{ Form::label('arabic_city', __('Arabic City'),['class' => 'col-form-label']) }}
                        {!! Form::text('arabic_city', null, ['placeholder' => __('Arabic City'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('location', __('Location'),['class' => 'col-form-label']) }}
                            {!! Form::text('location', null, ['placeholder' => __('Location'), 'class' => 'form-control'
                            ]) !!}
                        </div>

                        <div class="form-group col-6">
                            {{ Form::label('address', __('Address'),['class' => 'col-form-label']) }}
                            {!! Form::text('address', null, ['placeholder' => __('Address'), 'class' => 'form-control'])
                            !!}
                        </div>
                        <div class="form-group col-6">
                        {{ Form::label('arabic_address', __('Arabic Address'),['class' => 'col-form-label']) }}
                        {!! Form::text('arabic_address', null, ['placeholder' => __('Arabic Address'), 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-8">
                            <div class="choose-file d-flex align-items-center">
                                <div for="avatar" style="width: 50%">
                                    <label class="col-form-label">{{ __('Choose Event Image') }}</label>
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                                        data-filename="thumbnail" data-edit="{{ isset($event) ? 'true' : 'false' }}"
                                        style="width: 70%"  accept="image/*">
                                </div>
                                <p class="thumbnail ms-4 mb-0">
                                    @if(isset($event) && $event->thumbnail)
                                    <img src="{{ asset($event->thumbnail) }}" alt="Thumbnail" id="thumbnail1" width="70" height="70"
                                        style="border-radius: 3px; object-fit: cover">
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tag English & Arabic</label>
                            <select id="multiSelectDropdown" name="tags_ids[]" multiple class="form-control select2">
                                @foreach ($preferences as $preference)
                                    <?php
                                    $tagsIdsArray = explode(',',$event->tag_id);
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
                        <div class="form-group col-8">
                            {{ Form::label('description', __('Description English'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description', null, ['placeholder' => __('Description English'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description', null, ['placeholder' => __('Description English'), 'class'
                            => 'form-control' ,'rows' => 5]) !!} -->
                        </div>
                        <div class="form-group col-8">
                            {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'),
                            'class' => 'form-control' ,'rows' => 5]) !!} -->
                        </div>

                    </div>
                    <div class="row">

                        <!-- <div class="form-group col">
                    {{ Form::label('date', __('Event Date'), ['class' => 'col-form-label']) }}
                    {!! Form::date('date', null, ['placeholder' => __('Event Date'), 'class' => 'form-control', 'style' => 'width:50%', 'min' => now()->format('Y-m-d')]) !!}
                    </div> -->
                        <div class="form-group col">
                            {{ Form::label('date', __('Event Date'),['class' => 'col-form-label']) }}
                            &nbsp;&nbsp;
                            <div class="d-flex">
                                {{ Form::label('from', __('From'),['class' => 'col-form-label']) }}
                                &nbsp;&nbsp;
                                {!! Form::date('from_date', null, ['placeholder' => __('Event Date'), 'class' =>
                                'form-control', 'id' => 'from_date', 'min' => now()->format('Y-m-d')]) !!}
                                &nbsp;&nbsp;
                                {{ Form::label('to', __('To'),['class' => 'col-form-label']) }}
                                &nbsp;&nbsp;
                                {!! Form::date('to_date', null, ['placeholder' => __('Event Date'), 'class' =>
                                'form-control', 'id' => 'to_date', 'min' => now()->format('Y-m-d')]) !!}
                            </div>
                        </div>

                        <!-- <div class="form-group">
                        {{ Form::label('time', __('Event Time'),['class' => 'col-form-label']) }}
                        {!! Form::text('time', null, ['placeholder' => __('Event Time'), 'class' => 'form-control']) !!}
                    </div> -->
                        <div class="form-group col">
                            {{ Form::label('time', __('Event Time'),['class' => 'col-form-label']) }}
                            &nbsp;&nbsp;
                            <div class="d-flex">
                                {{ Form::label('from_time', __('From'),['class' => 'col-form-label']) }}
                                &nbsp;&nbsp;
                                {!! Form::time('from_time', null, ['placeholder' => __('Event Time'), 'class' => 'form-control'  , 'id' => 'from_time' ]) !!}
                                &nbsp;&nbsp;
                                {{ Form::label('to_time', __('To'),['class' => 'col-form-label']) }}
                                &nbsp;&nbsp;
                                {!! Form::time('to_time', null, ['placeholder' => __('Event Time'), 'class' =>'form-control'  ,'id' => 'to_time' ]) !!}
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered" id="dynamicTable">
                        <tr>
                            <th>Type</th>
                            <th>Type Arabic</th>
                            <th>Name</th>
                            <th>Name Arabic</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach($eventpeople as $key => $eventPerson)
                        <tr>
                            <td>
                                <input type="hidden" name="addmore[{{$key}}][id]" id="addmore[{{$key}}][id]" value="{{ $eventPerson->id }}"  class="form-control" />
                                <input name="addmore[{{$key}}][type]" class="chapter_id form-control" value="{{ $eventPerson->type }}">
                            </td>
                            <td>
                                <input name="addmore[{{$key}}][type_arabic]" class="chapter_id form-control" value="{{ $eventPerson->type_arabic }}">
                            </td>
                            <td>
                                <input type="text" name="addmore[{{$key}}][name]" placeholder="Name" class="form-control" value="{{ $eventPerson->name }}" />
                            </td>
                            <td>
                                <input type="text" name="addmore[{{$key}}][name_arabic]" placeholder="اسم" class="form-control" value="{{ $eventPerson->name_arabic }}" />
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <input type="file" name="addmore[{{$key}}][image]"  class="form-control"  accept="image/*" />
                                    <div class="ms-2">
                                        @if($eventPerson->image)
                                        <img src="{{ asset($eventPerson->image) }}" alt="EventPerson Image" width="50"
                                            height="50" style="border-radius:3px">
                                            <!-- <input type="hidden" name="hiddenImage[]" value="{{ $eventPerson->image }}" /> -->
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                    @if($eventPerson['deleted_at']!="")
                                <a href="{{ route('Show-event.restore' , ['id' => $eventPerson['id']]) }}" class="btn btn-success"
                                    onclick="return confirm('Are you sure you want to restore this item?');">restore</a>
                                    @else
                                    <a href="{{ route('Show-event.destroy-custom' , ['id' => $eventPerson['id']]) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item?');">delete</a>
                                    @endif
                        </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <input name="addmore[{{ $highestIndex + 1 }}][type]"  placeholder="Ex.Organizer" class="chapter_id form-control eventtype">
                            </td>
                            <td>
                                <input name="addmore[{{ $highestIndex + 1 }}][type_arabic]"  placeholder="المنظم السابق" class="chapter_id form-control eventtype">
                            </td>
                            <td>
                                <input type="text"  name="addmore[{{ $highestIndex + 1 }}][name]" placeholder="Name" class="form-control eventpeoplename" />
                            </td>
                            <td>
                                <input type="text"  name="addmore[{{ $highestIndex + 1 }}][name_arabic]" placeholder="اسم" class="form-control eventpeoplename" />
                            </td>
                            <td>
                                <input type="file" name="addmore[{{ $highestIndex + 1 }}][image]" class="form-control image-input"  accept="image/*" />
                            </td>
                            <td>
                                <button type="button" name="add" id="add" class="btn btn-primary">Add More</button>
                            </td>
                        </tr>
                    </table>
                    <div class="card-footer" style="padding: 10px 0px !important;">
                        <div class="d-flex justify-content-end gap-1">
                            <a href="{{ route('Show-event.index') }}"
                                class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" onclick="return validateform();" class="btn btn-primary mb-3">{{ __('Update') }}</button>
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
<!-- Your HTML code for the table and form -->

<script type="text/javascript">

var currentIndex = '{{ $highestIndex + 1 }};'
$("#add").click(function() {
    ++currentIndex;
    let appendError = 0;

    // Check input fields with class "eventtype"
    const eventtypes = document.querySelectorAll('.eventtype');
    eventtypes.forEach(eventtype => {
        if (eventtype.value.trim() == '') {
            eventtype.style.border = '1px solid red';
            appendError = 1;
        } else {
            eventtype.removeAttribute('style');
        }
    });

    // Check input fields with class "eventpeoplename"
    const eventpeoplenames = document.querySelectorAll('.eventpeoplename');
    eventpeoplenames.forEach(eventpeoplename => {
        if (eventpeoplename.value.trim() == '') {
            eventpeoplename.style.border = '1px solid red';
            appendError = 1;
        } else {
            eventpeoplename.removeAttribute('style');
        }
    });
    const imageInputs = document.querySelectorAll('.image-input');
    imageInputs.forEach(imageInput => {
    if (imageInput.value.trim() == '') {
        imageInput.style.border = '1px solid red'; // Add a red border to the image input
        appendError = 1;
    } else {
        imageInput.removeAttribute('style');
    }
});

    // If no validation errors, append a new row to the table
    if (appendError == 0) {
        $("#dynamicTable").append('<tr><td><input name="addmore['+currentIndex+'][type]" id="addmore['+currentIndex+'][type]" placeholder="Ex.Organizer" class="chapter_id form-control"></td><td><input name="addmore['+currentIndex+'][type_arabic]" id="addmore['+currentIndex+'][type_arabic]" placeholder="المنظم السابق" class="chapter_id form-control"></td><td><input type="text" name="addmore['+currentIndex+'][name]"  id="addmore['+currentIndex+'][name]" placeholder="اسم" class="form-control" /></td><td><input type="text" name="addmore['+currentIndex+'][nameTarabic]"  id="addmore['+currentIndex+'][name_arabic]" placeholder="Name" class="form-control" /></td><td><input type="file" name="addmore['+currentIndex+'][image]" placeholder="Image"  class="form-control"  accept="image/*" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    }
});

// Remove row when "Remove" button is clicked
$(document).on('click', '.remove-tr', function(){
    $(this).parents('tr').remove();
});

    function updateCountInput() {
        $("#count").val(count);
    }
</script>
<script>
    function validateform() {
        var error = 0;

        const formElement = document.getElementById('editEventForm');
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
            var confirmMessage = "Do you want to save the changes?";
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
    if (editFlag === 'true' && thumbnailInput.files.length === 0 && thumbnailInput.getAttribute(
        'data-filename')) {
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
</style>
<script>
// Add event listener to the "from" date input
document.getElementById('from_date').addEventListener('change', function() {
    // Get the selected value from "from" date input
    var fromDate = new Date(this.value);

    // Get the selected value from "to" date input
    var toDateInput = document.getElementById('to_date');
    var toDate = new Date(toDateInput.value);

    // Compare the dates
    if (fromDate > toDate) {
        // If "from" date is greater than "to" date, reset "to" date to match "from" date
        toDateInput.value = this.value;
    }
    // Restrict the "To" date input so it cannot be earlier than the selected "From" date
    toDateInput.min = this.value;
});

// Add event listener to the "to" date input
document.getElementById('to_date').addEventListener('change', function() {
    // Get the selected value from "to" date input
    var toDate = new Date(this.value);

    // Get the selected value from "from" date input
    var fromDateInput = document.getElementById('from_date');
    var fromDate = new Date(fromDateInput.value);

    // Compare the dates
    if (toDate < fromDate) {
        // If "to" date is less than "from" date, reset "from" date to match "to" date
        fromDateInput.value = this.value;
    }
});
</script>


@endpush
