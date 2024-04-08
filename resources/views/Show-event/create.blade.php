@extends('layouts.admin')

@section('title', __('Add Event'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('Show-event.index') }}">{{ __('Event') }}</a></li>
    <li class="breadcrumb-item">{{ __('Add Event') }}
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
                    <h5> {{ __('Add Event') }}</h5>

                </div>
                {!! Form::open(['route' => ['Show-event.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data' ,  'id' => 'createEventForm'] ) !!}
                <!-- <form method="POST" action="{{route('Show-event.store')}}" enctype="multipart/form-data" id="myForm"> -->
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-6">
                        {{ Form::label('title', __('Event Title'),['class' => 'col-form-label']) }}
                        {!! Form::text('title', null, ['placeholder' => __('Event Title'), 'class' => 'form-control', 'reqired']) !!}

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
                        {!! Form::text('location', null, ['placeholder' => __('Location'), 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-6">
                        {{ Form::label('address', __('Address'),['class' => 'col-form-label']) }}
                        {!! Form::text('address', null, ['placeholder' => __('Address'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('arabic_address', __('Arabic Address'),['class' => 'col-form-label']) }}
                        {!! Form::text('arabic_address', null, ['placeholder' => __('Arabic Address'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-8">
                        <div class="choose-file d-flex align-items-center">
                            <div for="avatar" style="width: 50%">
                                {{ Form::label('Image', __('Choose Event Image'),['class' => 'col-form-label']) }}
                                <input type="file" accept="image/*" class="form-control" id="thumbnail" name="thumbnail" data-filename="thumbnail" style="width: 70%"  accept="image/*">
                            </div>
                            <div class="thumbnail ms-4">
                                <img id="selectedThumbnail" src="" alt="Selected Thumbnail" width="70" height="70" style="border-radius: 3px; object-fit: cover" class="d-none">
                            </div>
                            <p class="thumbnail"></p>
                        </div>
                    </div>
                    <div class="form-group col-8">
                        <label class="col-form-label">Tag English & Arabic</label>
                        <select id="multiSelectDropdown" name="tags_ids[]" multiple class=" form-control select2">
                            @foreach ($preferences as $preference)
                            <option value="{{ $preference->id }}">
                            {{ $preference->preferences_name }} ( {{ $preference->arbic_preferences_name }} )
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-8">
                        {{ Form::label('description', __('Description English'),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                            {!! Form::textarea('description', null, ['placeholder' => __('Description English'), 'class' => 'form-control myTextarea']) !!}
                        </div>
                        </div>
                    <div class="form-group col-8">
                        {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                            {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control myTextarea']) !!}
                        </div>
                    </div>

                   <div class="row">

                   <div class="form-group col">
                        {{ Form::label('date', __('Event Date'),['class' => 'col-form-label']) }}
                        &nbsp;&nbsp;
                        <div class="d-flex">
                            {{ Form::label('from_date', __('From'),['class' => 'col-form-label']) }}
                            &nbsp;&nbsp;
                            {!! Form::date('from_date', null, ['placeholder' => __('Event Date'), 'class' => 'form-control', 'id' => 'from_date', 'min' => now()->format('Y-m-d')]) !!}
                            &nbsp;&nbsp;
                            {{ Form::label('to_date', __('To'),['class' => 'col-form-label']) }}
                            &nbsp;&nbsp;
                            {!! Form::date('to_date', null, ['placeholder' => __('Event Date'), 'class' => 'form-control', 'id' => 'to_date', 'min' => now()->format('Y-m-d')]) !!}
                        </div>
                    </div>
                    <div class="form-group col">
                        {{ Form::label('time', __('Event Time'),['class' => 'col-form-label']) }}
                        &nbsp;&nbsp;
                        <div class="d-flex">
                        {{ Form::label('from_time', __('From'),['class' => 'col-form-label']) }}
                        &nbsp;&nbsp;
                        {!! Form::time('from_time', null, ['placeholder' => __('Event Time'), 'class' => 'form-control' , 'id' => 'from_time' ]) !!}
                        &nbsp;&nbsp;
                        {{ Form::label('to_time', __('To'),['class' => 'col-form-label']) }}
                        &nbsp;&nbsp;
                        {!! Form::time('to_time', null, ['placeholder' => __('Event Time'), 'class' => 'form-control' , 'id' => 'to_time']) !!}
                        </div>
                    </div>
                </div>
                    <div class="row">


                    <!-- <div class="form-group col">
                    {{ Form::label('date', __('Event Date'), ['class' => 'col-form-label']) }}
                    {!! Form::date('date', null, ['placeholder' => __('Event Date'), 'class' => 'form-control', 'style' => 'width:50%', 'min' => now()->format('Y-m-d')]) !!}
                    </div> -->
                   </div>

                </div>
                <input type="hidden" name="count" id="count" value="1">
                <table class="table table-bordered" id="dynamicTable">
                    <tr>
                        <th>Type</th>
                        <th>Type Arabic</th>
                        <th>Name</th>
                        <th>Name Arabic</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                    <td> <input type="text"  name="addmore[0][type]" id="eventtype"  placeholder="Ex. organizer"  class="chapter_id form-control eventtype"></td>
                    <td> <input type="text"  name="addmore[0][type_arabic]" id="eventtypearabic"  placeholder="السابق. منظم"  class="chapter_id form-control eventtype"></td>
                    <td><input type="text" id ="eventpeoplename" name="addmore[0][name]"  placeholder="Name" class="form-control eventpeoplename" /></td>
                    <td><input type="text" id ="eventpeoplenamearabic" name="addmore[0][name_arabic]"  placeholder="اسم" class="form-control eventpeoplename" /></td>
                    <td><input type="file" id="eventpeopleimage" name="addmore[0][image]"  class="form-control" accept="image/*" />
                    </td>
                    <td><button type="button" name="add" id="add" class="btn btn-primary" >Add More</button></td>
                    </tr>
                </table>

                <!--  -->
                <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex justify-content-end gap-1">
                        <a href="{{ route('Show-event.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                        <button type="submit" onclick="return validateform()" class="btn btn-primary mb-3">{{ __('Save') }}</button>
                    </div>
                </div>
            <!-- </form> -->
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
<script type="text/javascript">
    var i =0;
        $("#add").click(function(){
            ++i;

            let appendError = 0;
            const eventtypes = document.querySelectorAll('.eventtype');
            eventtypes.forEach(eventtype => {
                if (eventtype.value.trim() == '') {
                    eventtype.style.border = '1px solid red';
                    // document.getElementById('city').focus();
                    appendError = 1;
                }
                else{
                    eventtype.removeAttribute('style');
                }
            });
            const eventpeoplenames = document.querySelectorAll('.eventpeoplename');
            eventpeoplenames.forEach(eventpeoplename => {
                if (eventpeoplename.value.trim() == '') {
                    eventpeoplename.style.border = '1px solid red';
                    appendError = 1;
                }
                else{
                    eventpeoplename.removeAttribute('style');
                }
            });
            if(appendError==0){
                $("#dynamicTable").append('<tr><td><input type="text"  name="addmore['+i+'][type]" id="addmore['+i+'][type]"  placeholder="Ex. organizer"  class="chapter_id form-control eventtype"><td><input type="text"  name="addmore['+i+'][type]" id="addmore['+i+'][type_arabic]"  placeholder="السابق. منظم"  class="chapter_id form-control eventtype"></td><td><input type="text"  name="addmore['+i+'][name]" id="addmore['+i+'][name]" placeholder="Name" class="form-control eventpeoplename" /></td></td><td><input type="text"  name="addmore['+i+'][name_arabic]" id="addmore['+i+'][name_arabic]" placeholder="اسم" class="form-control eventpeoplename" /></td><td><input type="file"  name="addmore['+i+'][image]" id="addmore['+i+'][image]" placeholder="Image" class="form-control"  accept="image/*" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
            }
        });


    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });
    function updateCountInput() {
        $("#count").val(count);
    }

</script>


<script>
// function validateform(){
//     var eventTitle = $('#title').val();
//     var eventCity = $('#city').val();
//     var evenLocation = $('#location').val();
//     var evenAddress = $('#address').val();
//     var evenDescription = $('#description').val();
//     var evenDescription_arabic = $('#description_arabic').val();
//     var evenThumbnail = $('#thumbnail').val();
//     var evenDate = $('#date').val();
//     var evenFrom_date = $('#from_date').val();
//     var evenTo_date = $('#to_date').val();
//     var evenFrom_time = $('#from_time').val();
//     var evenTo_time = $('#to_time').val();
//     if(eventTitle.trim()=='')
//     {
//         var titleElement = document.getElementById('title');
//         titleElement.style.border = '1px solid red';
//         document.getElementById('title').focus();

//         var error = 1;
//     }
//     if(eventCity.trim()=='')
//     {
//         var cityElement = document.getElementById('city');
//         cityElement.style.border = '1px solid red';
//         document.getElementById('city').focus();
//         var error = 1;
//     }
//     if(evenLocation.trim()=='')
//     {
//         var locationElement = document.getElementById('location');
//         locationElement.style.border = '1px solid red';
//         document.getElementById('location').focus();
//         var error = 1;
//     }
//     if(evenAddress.trim()=='')
//     {
//         var evenAddress = document.getElementById('address');
//         evenAddress.style.border = '1px solid red';
//         document.getElementById('address').focus();
//         var error = 1;
//     }
//     if (evenThumbnail=="") {
//         // errorMessage.textContent = "Please select an image.";
//         console.log( evenThumbnail);
//         var evenThumbnail = document.getElementById('thumbnail');
//         evenThumbnail.style.border = '1px solid red';
//         document.getElementById('thumbnail').focus();

//         var error = 1;
//     }
//     if(evenDescription.trim()=='')
//     {
//         var descriptionElement = document.getElementById('description');
//         descriptionElement.style.border = '1px solid red';
//         document.getElementById('description').focus();
//         var error = 1;
//     }
//     if(evenDescription_arabic.trim()=='')
//     {
//         var evenDescription_arabic = document.getElementById('description_arabic');
//         evenDescription_arabic.style.border = '1px solid red';
//         document.getElementById('description_arabic').focus();
//         var error = 1;
//     }

//     if(evenFrom_date.trim()=='')
//     {
//         var evenFrom_date = document.getElementById('from_date');
//         evenFrom_date.style.border = '1px solid red';
//         document.getElementById('from_date').focus();
//         var error = 1;
//     }
//     if(evenTo_date.trim()=='')
//     {
//         var evenTo_date = document.getElementById('to_date');
//         evenTo_date.style.border = '1px solid red';
//         document.getElementById('to_date').focus();
//         var error = 1;
//     }
//     if(evenFrom_time.trim()=='')
//     {
//         var evenFrom_time = document.getElementById('from_time');
//         evenFrom_time.style.border = '1px solid red';
//         document.getElementById('from_time').focus();
//         var error = 1;
//     }
//     if(evenTo_time.trim()=='')
//     {
//         var evenTo_time = document.getElementById('to_time');
//         evenTo_time.style.border = '1px solid red';
//         document.getElementById('to_time').focus();
//         var error = 1;
//     }
//     if(error==1){
//         return false;
//     }
//     else{
//         return true;
//     }
// }

// function validateform() {
//     var error = 0;
//     const formElement = document.getElementById('createEventForm');
//     const formElements = formElement.querySelectorAll('input, select, textarea');
//     formElements.forEach(element => {
//         const id = element.id;
//         var invalidField = '';
//         if (!id.startsWith('note-dialog')) {
//             const value = element.value;
//             if ((value=="" || value ==0 ) &&  id !="") {
//                 // var Label = document.querySelector("label[for='"+id+"']");
//                 // Label.style.color = 'red';
//                 invalidField = document.getElementById(id);
//                 invalidField.style.border = '1px solid red';
//                 error = 1;
//             }
//         }
//     });
//     if (error == 1) {
//         alert('please fill out all required fields ');
//         return false;
//     }

// }

function validateform() {
    var error = 0;
    const formElement = document.getElementById('createEventForm');
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
$( document ).ready(function() {
        $('.alert-danger').fadeOut(6000);

});



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
$(document).ready(function() {
  // Attach onchange event to the file input field with ID 'thumbnail'
  $('#thumbnail').on('change', function() {
    // Get the selected file from the input
    const file = $(this)[0].files[0];

    // Get the target element where the image thumbnail will be displayed
    const thumbnailElement = $('#selectedThumbnail');

    // Check if a file is selected
    if (file) {
      // Create a FileReader to read the image and show the thumbnail
      const reader = new FileReader();

      // Set the image source to the selected file
      reader.onload = function(event) {
        $('#selectedThumbnail').removeClass('d-none');
        thumbnailElement.attr('src', event.target.result);
      };

      reader.readAsDataURL(file);
    } else {
      // If no file is selected, clear the image thumbnail
      $('#selectedThumbnail').addClass('d-none');
      thumbnailElement.attr('src', '');
    }
  });
});
</script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.myTextarea').summernote({
            height: 300, // Set the editor's height
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['picture', 'video']],
            ]
        });
    });
</script>

@endpush

