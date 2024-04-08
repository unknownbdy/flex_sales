@extends('layouts.admin')
@section('title', __('Create Podcast'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('podcast-video.index') }}">{{ __('PodcastVideo') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create Podcast') }}</li>
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
                    <h5> {{ __('Create Podcast') }}</h5>
                </div>
                {!! Form::open(['route' => 'podcast-video.store', 'method' => 'POST' , 'enctype' => 'multipart/form-data' , 'id' => 'createPodcastForm']) !!}
                <div class="card-body">
                    <div class="row">
                    @if(!empty($podcast))
                        <div class="form-group col-6">
                            {{ Form::label('teaser_english', __('Teaser Name English'),['class' => 'col-form-label']) }}
                            {!! Form::text('teaser_english',$podcast->teaser_english, ['placeholder' => __('Teaser Name English'), 'class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group col-6">
                            {{ Form::label('teaser_arabic', __('Teaser Name Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('teaser_arabic', $podcast->teaser_arabic, ['placeholder' => __('Teaser Name Arabic'), 'class' =>
                            'form-control']) !!}
                        </div>
                        <div class="form-group col-12">
                            <label for="tag_id" class="col-form-label">Tag English & Arabic</label>
                            <select class="form-control select2" multiple="" name="tag_id[]" id="tag_id">
                                @foreach ($preferences as $preference)
                                    <option value="{{ $preference->id }}"
                                        {{ in_array($preference->id, explode(',', $podcast->tag_id)) ? 'selected' : '' }}>
                                        {{ $preference->preferences_name }} ({{ $preference->arbic_preferences_name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('description_english', __('Description English'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description_english', $podcast->description_english, ['placeholder' => __('Description
                                English'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description_english', null, ['placeholder' => __('Description English'), 'class' => 'form-control']) !!} -->
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description_arabic', $podcast->description_arabic, ['placeholder' => __('Description
                                Arabic'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control']) !!} -->
                        </div>
                        <!-- <div class="form-group col-6">
                            <label for="podcast_thumbnail" class="col-form-label">Podcast Thumbnail</label>
                            <input type="file" name="podcast_thumbnail"  id="podcast_thumbnail" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group col-6">

                         <img id="thumbnailPreview" style="height: 125px;width: 95px;display: none;" src="" alt="" />

                        </div> -->
                        <div class="form-group col-8">
                            <div class="choose-file d-flex align-items-center">
                                <div for="avatar" style="width: 50%">

                                    <label for="thumbnail" class="col-form-label">{{ __('Podcast Thumbnail') }}</label>
                                    <input type="file" class="form-control" name="podcast_thumbnail" id="thumbnail"
                                        data-filename="podcast_thumbnail" data-edit="{{ isset($podcast) ? 'true' : 'false' }}"
                                        style="width: 70%"  accept="image/*">
                                </div>
                                <p class="thumbnail ms-4 mb-0">
                                    @if(isset($podcast) && $podcast->thumbnail)
                                    <img src="{{ asset($podcast->thumbnail) }}" alt="podcast_thumbnail" width="70" height="70"
                                        style="border-radius: 3px; object-fit: cover">
                                    @endif
                                </p>
                            </div>
                        </div>
                        <input type="hidden" name="parent_id" value="{{$podcast->id}}"/>
                        <!--  -->
                        @else
                        <div class="form-group col-6">
                            {{ Form::label('teaser_english', __('Teaser Name English'),['class' => 'col-form-label']) }}
                            {!! Form::text('teaser_english',null, ['placeholder' => __('Teaser Name English'), 'class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group col-6">
                            {{ Form::label('teaser_arabic', __('Teaser Name Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('teaser_arabic', null, ['placeholder' => __('Teaser Name Arabic'), 'class' =>
                            'form-control']) !!}
                        </div>
                        <div class="form-group col-12">
                        <label class="col-form-label">Tag English & Arabic</label>
                        <select id="multiSelectDropdown" name="tag_id[]" multiple class=" form-control select2">
                            @foreach ($preferences as $preference)
                            <option value="{{ $preference->id }}">
                            {{ $preference->preferences_name }} ( {{ $preference->arbic_preferences_name }} )
                            </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('description_english', __('Description English'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description_english', null, ['placeholder' => __('Description
                                English'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description_english', null, ['placeholder' => __('Description English'), 'class' => 'form-control']) !!} -->
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                            <div class="mb-3">
                                {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description
                                Arabic'), 'class' => 'form-control myTextarea']) !!}
                            </div>
                            <!-- {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control']) !!} -->
                        </div>
                        <div class="form-group col-6">
                            <label for="thumbnail" class="col-form-label">Podcast Thumbnail</label>
                            <input type="file" name="podcast_thumbnail"  id="thumbnail" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group col-6">

                         <img id="thumbnailPreview" style="height: 125px;width: 95px;display: none;" src="" alt="" />

                        </div>
                        @endif

                        <!--  -->


                        <!-- <div class="form-group col-4">
                            <label for="podcast_type" class="col-form-label">Podcast Type</label>
                            <select name="podcast_type" onchange="changePodcastType(this.value)" id="podcast_type"
                                class="form-control">
                                <option value="">--Select--</option>
                                <option value="1">Individual</option>
                                <option value="2">Episodes</option>
                            </select>
                        </div> -->

                        <!-- <div class="form-group">
                            {{ Form::label('link', __('Link '),['class' => 'col-form-label']) }}
                            {!! Form::url('link', null, ['placeholder' => __('Link'), 'class' => 'form-control']) !!}
                        </div> -->
                        <!-- <div class="form-group col-4">
                            {{ Form::label('episods', __('Episods'),['class' => 'col-form-label']) }}
                            <div class="position-relative">
                                <input placeholder="Episods" pattern="[0-9]" class="form-control" id="episods" name=""
                                    type="number" min="1">
                                <span onclick="episodsList()" class="badge position-absolute fs-6 bg-success p-1"
                             style="top: 9px; right: 5px; cursor:pointer"><i class="ti ti-check"></i></span> -->
                            </div>
                        </div>
                        <!-- <div id="dynamicEpisodes"> -->
            <div class="card">
                <div class="card-header">
                    <h5> Episodes</h5>
                </div>
                <div class="card-body" id="appendDynamicEpisodes">
                    <div class="row" id="removeThis${rowsCountNo}">
                        <div class="form-group col-6">
                            <label for="title${rowsCountNo}">Title English</label>
                            <input type="text" id="title${rowsCountNo}"
                                name="addmore[${rowsCountNo}][title]" placeholder="title English"
                                class="form-control" />
                        </div>
                        <div class="form-group col-6">
                            <label for="title_arabic${rowsCountNo}">Title Arabic</label>
                            <input type="text" id="title_arabic${rowsCountNo}"
                                name="addmore[${rowsCountNo}][title_arabic]"
                                placeholder="title Arabic" class="form-control" />
                        </div>
                        <div class="form-group col-6">
                            <label for="tags${rowsCountNo}">Tags</label>
                            <select id="tags${rowsCountNo}" name="addmore[${rowsCountNo}][tags][]" multiple=""
                                class="form-control select2">
                                @foreach ($preferences as $preference)
                                <option value="{{ $preference->id }}">
                                    {{ $preference->preferences_name }} (
                                    {{ $preference->arbic_preferences_name }} )
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="link${rowsCountNo}">Link</label>
                            <input type="url" id="link${rowsCountNo}"
                                name="addmore[${rowsCountNo}][link]" placeholder="Episode Link"
                                class="form-control" />
                        </div>
                        <div class="form-group col-12">
                            <label for="description${rowsCountNo}">Description English</label>
                            <textarea id="description${rowsCountNo}"
                                name="addmore[${rowsCountNo}][description]"
                                placeholder="Episode Description English"
                                class="form-control myTextarea"></textarea>
                        </div>
                        <div class="form-group col-12">
                            <label for="description_arabic${rowsCountNo}">Description Arabic</label>
                            <textarea id="description_arabic${rowsCountNo}"
                                name="addmore[${rowsCountNo}][description_arabic]"
                                placeholder="Episode Description Arabic"
                                class="form-control myTextarea"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="thumbnail1" class="col-form-label">Thumbnail</label>
                            <input type="file" name="thumbnail"  id="thumbnail1" accept="image/*" class="form-control">
                        </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-footer">
                    <div class="float-center text-center">
                        <a href="javascript:;" onclick="addMore()" class="btn btn-info">Add More Episodes</a>
                    </div>
                </div> -->
            </div>
            <div class="card-footer" style="padding: 10px 0px !important;">
            <div class="d-flex align-items-center justify-content-end px-4 py-2 gap-2">
                        <a href="{{ route('podcast-video.index') }}"
                            class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" onclick="return validateform()" class="btn btn-primary mb-3">{{ __('Save') }}</button>
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

podcast_thumbnail.onchange = evt => {
  const [file] = podcast_thumbnail.files
  if (file) {
    $('#thumbnailPreview').show();
    thumbnailPreview.src = URL.createObjectURL(file)
  }
  else{
    thumbnailPreview.src = "";
    $('#thumbnailPreview').hide();
  }
}

// const numericzip = document.getElementById('episods');
// numericzip.addEventListener('input', function(event) {
//     const inputValue = event.target.value;
//     const isValid = /^[1-9]\d*$/.test(inputValue);

//     if (!isValid || inputValue < 0) {
//         document.getElementById('episods').value = '';
//         document.getElementById('episods').style.borderColor = 'red';
//     } else {
//         document.getElementById('episods').style.borderColor = '';
//     }
// });

// function episodsList() {
//     var episods = document.getElementById('episods').value;
//     var count = document.getElementById('count');
//     if (parseInt(count.value) > 0) {
//         if (parseInt(count.value) > episods) {
//             var diff = parseInt(count.value) - episods;
//             for (let removeTr = parseInt(count.value); removeTr > episods; removeTr--) {
//                 $("#removeEpisode" + removeTr).remove();
//             }
//         } else {
//             var diff = episods - parseInt(count.value);
//             var appendEpisodes = '';
//             for (let appendEpisode = parseInt(count.value) + 1; appendEpisode <= episods; appendEpisode++) {
//                 console.log("appendEpisode: " + appendEpisode);
//                 appendEpisodes +=
//                     `<tr id="removeEpisode${appendEpisode}">

//                         <td><input type="text" id="title${appendEpisode}" name="addmore[${appendEpisode}][title]" placeholder="title English" class="form-control" /></td>

//                         <td><input type="text" id="title_arabic${appendEpisode}" name="addmore[${appendEpisode}][title_arabic]" placeholder="title Arabic" class="form-control" /></td>

//                         <td><textarea  id="description${appendEpisode}" name="addmore[${appendEpisode}][description]" placeholder="Episode Description English" class="form-control" ></textarea></td>

//                         <td><textarea  id="description_arabic${appendEpisode}" name="addmore[${appendEpisode}][description_arabic]" placeholder="Episode Description Arabic" class="form-control" ></textarea></td>

//                         <td>
//                             <select  id="tags${appendEpisode}" name="addmore[${appendEpisode}][tags][]"  class="form-control select2" >
//
//                             </select>
//                         </td>

//                         <td><input type="url" id="link${appendEpisode}" name="addmore[${appendEpisode}][link]" placeholder="Episode Link" class="form-control" /></td>
//                     </tr> `;
//             }
//             $("#episodeTable").append(appendEpisodes);
//         }
//         $('#count').val(episods);
//     } else {
//         var episodsHtml =
//             `<table class="table table-bordered" id="episodeTable" >
//                 <tr>
//                     <th>Title English</th>
//                     <th>Title Arabic</th>
//                     <th>Description English</th>
//                     <th>Description Arabic</th>
//                     <th>Episode Tags</th>
//                     <th>Episode Link</th>
//                 </tr>`;
//         for (let episodeNo = 1; episodeNo <= episods; episodeNo++) {
//             episodsHtml +=
//                 `<tr id="removeEpisode${episodeNo}">

//                     <td><input type="text" id="title${episodeNo}" name="addmore[${episodeNo}][title]" placeholder="title English" class="form-control" /></td>

//                     <td><input type="text" id="title_arabic${episodeNo}" name="addmore[${episodeNo}][title_arabic]" placeholder="title Arabic" class="form-control" /></td>

//                     <td><textarea  id="description${episodeNo}" name="addmore[${episodeNo}][description]" placeholder="Episode Description English" class="form-control" ></textarea></td>

//                     <td><textarea  id="description_arabic${episodeNo}" name="addmore[${episodeNo}][description_arabic]" placeholder="Episode Description Arabic" class="form-control" ></textarea></td>

//                     <td><select  id="tags${episodeNo}" name="addmore[${episodeNo}][tags][]"  class="form-control select2" >
//
//                     </select></td>

//                     <td><input type="text" id="link${episodeNo}" name="addmore[${episodeNo}][link]" placeholder="Episode Link" class="form-control" /></td>


//                 </tr> `;
//         }
//         $("#dynamicEpisodes").html(episodsHtml + '</table>');
//         $('#count').val(episods);
//     }
// }

function validateform() {
    var error = 0;
    const formElement = document.getElementById('createPodcastForm');
    const formElements = formElement.querySelectorAll('input, select, textarea');
    const excludedIds = ['thumbnail'];
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





function changePodcastType(podcast_type) {
    if(podcast_type==''){
        $("#dynamicEpisodes").html('');
    }
    if (podcast_type == 1) {
        let link =
            `<div class="form-group col-12">
            <label for="link" class="col-form-label">Link </label>
            <input placeholder="Link" class="form-control" name="link" type="url" id="link">
        </div>`;
        $("#dynamicEpisodes").html(link);
    }
    if (podcast_type == 2) {
        var rowsCount = document.getElementById('count').value;
        var rowsCountNo = parseInt(rowsCount) + 1;
        var dynamicEpisodes =
            `<div class="card">
                <div class="card-header">
                    <h5> Episodes</h5>
                </div>
                <div class="card-body" id="appendDynamicEpisodes">
                    <div class="row" id="removeThis${rowsCountNo}">
                        <div class="form-group col-6">
                            <label for="title${rowsCountNo}">Title English</label>
                            <input type="text" id="title${rowsCountNo}"
                                name="addmore[${rowsCountNo}][title]" placeholder="title English"
                                class="form-control" />
                        </div>
                        <div class="form-group col-6">
                            <label for="title_arabic${rowsCountNo}">Title Arabic</label>
                            <input type="text" id="title_arabic${rowsCountNo}"
                                name="addmore[${rowsCountNo}][title_arabic]"
                                placeholder="title Arabic" class="form-control" />
                        </div>
                        <div class="form-group col-6">
                            <label for="tags${rowsCountNo}">Tags</label>
                            <select id="tags${rowsCountNo}" name="addmore[${rowsCountNo}][tags][]" multiple=""
                                class="form-control select2">
                                @foreach ($preferences as $preference)
                                <option value="{{ $preference->id }}">
                                    {{ $preference->preferences_name }} (
                                    {{ $preference->arbic_preferences_name }} )
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="link${rowsCountNo}">Link</label>
                            <input type="url" id="link${rowsCountNo}"
                                name="addmore[${rowsCountNo}][link]" placeholder="Episode Link"
                                class="form-control" />
                        </div>
                        <div class="form-group col-12">
                            <label for="description${rowsCountNo}">Description English</label>
                            <textarea id="description${rowsCountNo}"
                                name="addmore[${rowsCountNo}][description]"
                                placeholder="Episode Description English"
                                class="form-control myTextarea"></textarea>
                        </div>
                        <div class="form-group col-12">
                            <label for="description_arabic${rowsCountNo}">Description Arabic</label>
                            <textarea id="description_arabic${rowsCountNo}"
                                name="addmore[${rowsCountNo}][description_arabic]"
                                placeholder="Episode Description Arabic"
                                class="form-control myTextarea"></textarea>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="float-center text-center">
                        <a href="javascript:;" onclick="addMore()" class="btn btn-info">Add mode</a>
                    </div>
                </div>
            </div>`;
        $("#dynamicEpisodes").html(dynamicEpisodes);

        $('#count').val(rowsCountNo);
        $('.myTextarea').summernote({
            height: 300, // Set the editor's height
            toolbar: [
                // ['style', ['bold', 'italic', 'underline', 'clear']],
                // ['fontsize', ['fontsize']],
                // ['para', ['ul', 'ol', 'paragraph']],
                // ['insert', ['picture', 'video']],

                ['style', ['style']],
                ['font', ['bold',  'italic','underline', 'clear' , 'fontsize']],
                ['color', ['color']],

                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['picture', 'video']],
            ]
        });
    }
}


function addMore() {
    var rowsCount = document.getElementById('count').value;
    var rowsCountNo = parseInt(rowsCount) + 1;
    var appendDynamicEpisodes =
        `<hr id="removehr${rowsCountNo}"><div class="row" id="removeThis${rowsCountNo}">
            <div class="form-group col-6">
                <label for="title${rowsCountNo}">Title English</label>
                <input type="text" id="title${rowsCountNo}"
                    name="addmore[${rowsCountNo}][title]" placeholder="title English"
                    class="form-control"/>
            </div>
            <div class="form-group col-6">
                <label for="title_arabic${rowsCountNo}">Title Arabic</label>
                <input type="text" id="title_arabic${rowsCountNo}"
                    name="addmore[${rowsCountNo}][title_arabic]"
                    placeholder="title Arabic" class="form-control" />
            </div>
            <div class="form-group col-6">
                <label for="tags${rowsCountNo}">Tags</label>
                <select id="tags${rowsCountNo}" name="addmore[${rowsCountNo}][tags][]" multiple=""
                    class="form-control select2">
                    @foreach ($preferences as $preference)
                    <option value="{{ $preference->id }}">
                        {{ $preference->preferences_name }} (
                        {{ $preference->arbic_preferences_name }} )
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="link${rowsCountNo}">Link</label>
                <input type="url" id="link${rowsCountNo}"
                    name="addmore[${rowsCountNo}][link]" placeholder="Episode Link"
                    class="form-control" />
            </div>
            <div class="form-group col-12">
                <label for="description${rowsCountNo}">Description English</label>
                <textarea id="description${rowsCountNo}"
                    name="addmore[${rowsCountNo}][description]"
                    placeholder="Episode Description English"
                    class="form-control"></textarea>
            </div>
            <div class="form-group col-12">
                <label for="description_arabic${rowsCountNo}">Description Arabic</label>
                <textarea id="description_arabic${rowsCountNo}"
                    name="addmore[${rowsCountNo}][description_arabic]"
                    placeholder="Episode Description Arabic"
                    class="form-control"></textarea>
            </div>
            <div class="float-center text-center">
                <a href="javascript:;" onclick="removeEpisode(${rowsCountNo})" class="btn btn-danger">Remove</a>
            </div>
        </div>`;
    $("#appendDynamicEpisodes").append(appendDynamicEpisodes);
    $('#count').val(rowsCountNo);
}

function removeEpisode(id) {
    $("#removeThis" + id).remove();
    $("#removehr"+id).remove();
}
</script>


@endpush
