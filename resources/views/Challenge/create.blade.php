@extends('layouts.admin')
@section('title', __('Create Challenge'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('Challenge.index') }}">{{ __('Challenges') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create Challenge') }}</li>
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
                    <h5> {{ __('Create Challenge') }}</h5>
                </div>
                {!! Form::open(['route' => 'Challenge.store', 'method' => 'POST' ,  'enctype' => 'multipart/form-data' ,'id' => 'createChallengeForm']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            {{ Form::label('title_english', __('Title English'),['class' => 'col-form-label']) }}
                            {!! Form::text('title_english', null, ['placeholder' => __('Title English'), 'class' =>
                            'form-control' ]) !!}
                        </div>
                        <div class="form-group col-6">
                            {{ Form::label('title_arabic', __('Title Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('title_arabic', null, ['placeholder' => __('Title Arabic'), 'class' =>
                            'form-control']) !!}
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


                        <div class="form-group col-12">
                            {{ Form::label('description_english', __('Description'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description_english', null, ['placeholder' => __('Description'),
                                'class'
                                => 'form-control myTextarea']) !!}
                            </div>
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                <textarea name="description_arabic" id="description_arabic"
                                    class="form-control myTextarea"></textarea>
                                <!-- {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control myTextarea' ]) !!} -->
                            </div>
                        </div>

                        <div class="form-group col-4">
                            {{ Form::label('journey_days', __('Journey Days'),['class' => 'col-form-label']) }}
                            <div class="position-relative">
                                <input placeholder="Journey Days between 0 to 45 " pattern="[0-9]" class="form-control"
                                    id="journey_days" name="" type="number" max="45" min="1">
                                <span onclick="journeyDaysList()" class="badge position-absolute fs-6 bg-success p-1"
                                    style="top: 9px; right: 5px; cursor:pointer"><i class="ti ti-check"></i></span>
                            </div>
                        </div>
                    </div>
                    <div id="dynamicTable"></div>



                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('Challenge.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                        <button type="submit" onclick="return validateform()"
                        class="btn btn-primary mb-3">{{ __('Save') }}</button>

                    </div>
                </div>

                {!! Form::close() !!}
                <input type="hidden" name="count" id="count" value="0">
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

const numericzip = document.getElementById('journey_days');
numericzip.addEventListener('input', function(event) {
    const inputValue = event.target.value;
    const isValid = /^[1-9]\d*$/.test(inputValue);

    if (!isValid || inputValue > 45 || inputValue < 0) {
        document.getElementById('journey_days').value = '';
        document.getElementById('journey_days').style.borderColor = 'red';
    } else {
        document.getElementById('journey_days').style.borderColor = '';
    }
});


function journeyDaysList() {
    var journeyDays = document.getElementById('journey_days').value;
    var count = document.getElementById('count');
    console.log('count', count.value, ' journeyDays', journeyDays)
    if (parseInt(count.value) > 0) {
        if (parseInt(count.value) > journeyDays) {
            var diff = parseInt(count.value) - journeyDays;
            for (let removeTr = parseInt(count.value); removeTr > journeyDays; removeTr--) {
                $("#removeJourney" + removeTr).remove();
            }
        } else {
            var diff = journeyDays - parseInt(count.value);
            console.log("diff: " + diff);
            var appendJourney = '';
            for (let appendDay = parseInt(count.value) + 1; appendDay <= journeyDays; appendDay++) {
                console.log("appendDay: " + appendDay);
                appendJourney +=
                    `<tr id="removeJourney${appendDay}">
                        <td width="30">${appendDay}<input type="hidden" readonly id="day${appendDay}" name="addmore[${appendDay}][day]" value="${appendDay}" class="" /></td>
                        <td><input type="text" id="title_english${appendDay}" name="addmore[${appendDay}][title_english]" placeholder="title English" class="form-control" /></td>
                        <td><input type="text" id="title_arabic${appendDay}" name="addmore[${appendDay}][title_arabic]" placeholder="title Arabic" class="form-control" /></td>
                        <td><input type="text" id="tv_show_name${appendDay}" name="addmore[${appendDay}][tv_show_name]" placeholder="TV Show Name" class="form-control" /></td>
                        <td><input type="text" id="channel_name${appendDay}" name="addmore[${appendDay}][channel_name]" placeholder="Channel Name" class="form-control" /></td>
                        <td><input  type="file" accept="image/*" id="thumbnail${appendDay}" name="addmore[${appendDay}][thumbnail]" placeholder="" class="form-control" /></td>
                        <td><input type="text" id="video_link${appendDay}" name="addmore[${appendDay}][video_link]" placeholder="Video Link" class="form-control" /></td>
                    </tr> `;
            }
            $("#journeyTable").append(appendJourney);
        }
        $('#count').val(journeyDays);
    } else {
        var journey =
            `<table class="table table-bordered" id="journeyTable" >
                <tr>
                    <th width="30">Day</th>
                    <th>Title English</th>
                    <th>Title Arabic</th>
                    <th>TV Show</th>
                    <th>Channel</th>
                    <th>Image</th>
                    <th>Video Link</th>
                </tr>`;
        for (let day = 1; day <= journeyDays; day++) {
            journey +=
                `<tr id="removeJourney${day}">
                    <td width="30">${day}<input type="hidden" id="day${day}" readonly name="addmore[${day}][day]" value="${day}" class="" /></td>
                    <td><input type="text" id="title_english${day}" name="addmore[${day}][title_english]" placeholder="title English" class="form-control" /></td>
                    <td><input type="text" id="title_arabic${day}" name="addmore[${day}][title_arabic]" placeholder="title Arabic" class="form-control" /></td>
                    <td><input type="text" id="tv_show_name${day}" name="addmore[${day}][tv_show_name]" placeholder="TV Show Name" class="form-control" /></td>
                    <td><input type="text" id="channel_name${day}" name="addmore[${day}][channel_name]" placeholder="Channel Name" class="form-control" /></td>
                    <td><input  type="file" accept="image/*" id="thumbnail${day}" name="addmore[${day}][thumbnail]" placeholder="" class="form-control" /></td>
                    <td><input type="text" id="video_link${day}" name="addmore[${day}][video_link]" placeholder="Video Link" class="form-control" /></td>
                </tr> `;
        }
        $("#dynamicTable").html(journey + '</table>');
        $('#count').val(journeyDays);
    }
}


// function validateform() {
//     var error = 0;
//     const formElement = document.getElementById('createChallengeForm');
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
    const formElement = document.getElementById('createChallengeForm');
    const formElements = formElement.querySelectorAll('input, select, textarea');
    const excludedIds = ['thumbnail']; // IDs to exclude from validation
    formElements.forEach(element => {
        const id = element.id;
        if (!id.startsWith('note-dialog')) {
            const value = element.value;
            if ((value == "" || value == 0) && id != "" && !excludedIds.includes(element.id)) {
                // var Label = document.querySelector("label[for='"+id+"']");
                // Label.style.color = 'red';
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
    }  else {
        // Check if the dynamic table is empty
        var dynamicTableContent = document.getElementById('dynamicTable').innerHTML;
        if (!dynamicTableContent.trim()) {
            alert('Please add mandatory content in the Journey Days.');
            setTimeout(function() {
                journeyDaysList(); // Call journeyDaysList() function after a delay
                }, 1000);
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
}
</script>

@endpush
