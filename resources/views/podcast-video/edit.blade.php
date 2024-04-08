@extends('layouts.admin')

@section('title', __('Edit Podcast video'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('podcast-video.index') }}">{{ __('podcast-video') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit podcast video') }}
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
                    <h5> {{ __('Edit podcast video') }}</h5>
                    {{-- {{($user->title)}} --}}
                </div>
                {{ Form::model($user, ['route' => ['podcast-video.update', $user->id], 'method' => 'PUT' ,'enctype' => 'multipart/form-data', 'id'=> 'editPodcastForm']) }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            {{ Form::label('teaser_english', __('Teaser Name English'),['class' => 'col-form-label']) }}
                            {!! Form::text('teaser_english', null, ['placeholder' => __('Teaser Name English'), 'class'
                            => 'form-control']) !!}
                        </div>
                        <div class="form-group col-6">
                            {{ Form::label('teaser_arabic', __('Teaser Name Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('teaser_arabic', null, ['placeholder' => __('Teaser Name Arabic'), 'class' =>
                            'form-control']) !!}
                        </div>
                        <div class="form-group col-12">
                            <label for="tag_id" class="col-form-label">Tag English & Arabic</label>
                            <select class="form-control select2" multiple="" name="tag_id[]" id="tag_id">
                                @foreach ($preferences as $preference)
                                <?php
                                    $tag_idArray = explode(',',$user->tag_id);
                                    if ($tag_idArray === null) {
                                        $tag_idArray = [];
                                    }
                                ?>
                                <option value="{{$preference->id}}" preference="{{ $preference->id }}"
                                    {{ in_array($preference->id, $tag_idArray) ? 'selected' : '' }}>
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
                        <!-- <div class="form-group col-6">
                            <label for="podcast_thumbnail" class="col-form-label">Podcast Thumbnail</label>
                            <input type="file" name="podcast_thumbnail" id="podcast_thumbnail" accept="image/*"
                                class="form-control">
                        </div>
                        <div class="form-group col-6">

                            <img id="thumbnailPreview" style="height: 125px;width: 95px;" src="{{ asset($user['thumbnail'])}}" alt="" />

                        </div> -->
                        <div class="form-group col-8">
                            <div class="choose-file d-flex align-items-center">
                                <div for="avatar" style="width: 50%">
                                    <label for="thumbnail" class="col-form-label">{{ __('Podcast Thumbnail') }}</label>
                                    <input  type="file" class="form-control" name="podcast_thumbnail" id="thumbnail"
                                        data-filename="podcast_thumbnail" data-edit="{{ isset($user) ? 'true' : 'false' }}"
                                        style="width: 70%"  accept="image/*">
                                </div>
                                <p class="thumbnail ms-4 mb-0">
                                    @if(isset($user) && $user->thumbnail)
                                    <img src="{{ asset($user->thumbnail) }}" alt="podcast_thumbnail" id="imgalert"  width="70" height="70"
                                        style="border-radius: 3px; object-fit: cover">
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- <div class="form-group col-4">
                            <label for="podcast_type" class="col-form-label">Podcast Type</label>
                            <select name="podcast_type" onchange="changePodcastType(this.value)" id="podcast_type"
                                class="form-control">
                                <option value="">--Select--</option>
                                <option <?php if($user["podcast_type"]==1) { echo "selected ";} ?> value="1">Individual
                                </option>
                                <option <?php if($user["podcast_type"]==2) { echo "selected ";} ?> value="2">Episodes
                                </option>
                            </select>
                        </div> -->
                        <!-- <div id="dynamicEpisodes"> -->
                        <!-- <div class="form-group col-12">
                            {{ Form::label('link', __('Link'),['class' => 'col-form-label']) }}
                            {!! Form::url('link', null, ['placeholder' => __('Link'), 'class' =>
                            'form-control']) !!}
                        </div> -->


                        <div class="card">
                            <div class="card-header">
                                <h5>Episodes</h5>
                            </div>
                            @if(!empty($podcast))
                                <div class="card-body" id="appendDynamicEpisodes">
                                    @foreach($podcast as $key => $value)
                                        <input type="hidden" value="{{$value['id']}}" name="addmore[{{$key+1}}][id]"/>
                                        <div class="row" id="removeThis{{$key+1}}">
                                            <div class="form-group col-6">
                                                <label for="title{{$key+1}}">Title English</label>
                                                <input type="text" id="title{{$key+1}}" value="{{$value['title']}}" name="addmore[{{$key+1}}][title]" placeholder="Title English" class="form-control" />
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="title_arabic{{$key+1}}">Title Arabic</label>
                                                <input type="text" id="title_arabic{{$key+1}}" value="{{$value['title_arabic']}}" name="addmore[{{$key+1}}][title_arabic]" placeholder="Title Arabic" class="form-control" />
                                            </div>
                                            <div class="form-group col-6">
                                        <label for="tags{{$key+1}}">Tags</label>
                                        <select id="tags{{$key+1}}" value="{{$value['tags']}}"
                                            name="addmore[{{$key+1}}][tags][]" multiple="" class="form-control select2">
                                            @foreach ($preferences as $preference)
                                            <?php
                                                $tagsArray = explode(',',$value->tags);
                                                if ($tagsArray === null) {
                                                    $tagsArray = [];
                                                }
                                            ?>
                                            <option value="{{ $preference->id }}"
                                                {{ in_array($preference->id, $tagsArray) ? 'selected' : '' }}>
                                                {{ $preference->preferences_name }} ( {{ $preference->arbic_preferences_name }} )
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="link{{$key+1}}">Link</label>
                                        <input type="url" id="link{{$key+1}}" value="{{$value['link']}}"
                                            name="addmore[{{$key+1}}][link]" placeholder="Episode Link"
                                            class="form-control" />
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="description{{$key+1}}">Description English</label>
                                        <textarea id="description{{$key+1}}" value="{{$value['description']}}"
                                            name="addmore[{{$key+1}}][description]"
                                            placeholder="Episode Description English"
                                            class="form-control myTextarea">{{$value['description']}}</textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="description_arabic{{$key+1}}">Description Arabic</label>
                                        <textarea id="description_arabic{{$key+1}}"
                                            name="addmore[{{$key+1}}][description_arabic]"
                                            placeholder="Episode Description Arabic"
                                            class="form-control myTextarea">{{$value['description_arabic']}}</textarea>
                                    </div>
                                            <!-- <div class="float-center text-center">
                                                <a href="{{ route('podcast-video.destroy' , ['id' => $value['id']]) }}" onclick="return confirm('Are you sure you want to delete this episode?');" class="btn btn-danger">Delete</a>
                                            </div> -->
                                        </div>
                                        <div class="form-group col-8">
                            <div class="choose-file d-flex align-items-center">
                                <div for="avatar" style="width: 50%">
                                    <label for="thumbnail1" class="col-form-label">{{ __('Thumbnail') }}</label>
                                    <input type="file" class="form-control" name="thumbnail1" id="thumbnail1"
                                        data-filename="thumbnail" data-edit="{{ isset($value['thumbnail']) ? 'true' : 'false' }}"
                                        style="width: 70%"  accept="image/*">
                                </div>
                                <p class="thumbnail ms-4 mb-0">
                                    @if(isset($value['thumbnail']) && $value->thumbnail)
                                    <img src="{{ asset($value->thumbnail) }}" alt="thumbnail" id="imgalert1" width="70" height="70"
                                        style="border-radius: 3px; object-fit: cover">
                                    @endif
                                </p>
                            </div>
                        </div>
                                    @endforeach
                                </div>
                            <!-- @else
                                <div class="card-body" id="appendDynamicEpisodes">
                                    <div class="row" id="removeThis0">
                                        <div class="form-group col-6">
                                            <label for="title0">Title English</label>
                                            <input type="text" id="title0"
                                                name="addmore[0][title]" placeholder="title English"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title_arabic0">Title Arabic</label>
                                            <input type="text" id="title_arabic0"
                                                name="addmore[0][title_arabic]"
                                                placeholder="title Arabic" class="form-control" />
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="tags0">Tags</label>
                                            <select id="tags0" name="addmore[0][tags][]" multiple=""
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
                                            <label for="link0">Link</label>
                                            <input type="url" id="link0"
                                                name="addmore[0][link]" placeholder="Episode Link"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="description0">Description English</label>
                                            <textarea id="description0"
                                                name="addmore[0][description]"
                                                placeholder="Episode Description English"
                                                class="form-control myTextarea"></textarea>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="description_arabic0">Description Arabic</label>
                                            <textarea id="description_arabic0"
                                                name="addmore[0][description_arabic]"
                                                placeholder="Episode Description Arabic"
                                                class="form-control myTextarea"></textarea>
                                        </div>
                            </div> -->
                            @endif
                            <!-- <div class="card-footer">
                                <div class="float-center text-center">
                                    <a href="javascript:;" onclick="addMore()" class="btn btn-info">Add more</a>
                                </div>
                            </div> -->
                        </div>


                        </div>
                    </div>
                </div>
                <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end mx-4 my-2 gap-2">
                        <a href="{{ route('podcast-video.index') }}"
                            class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
                        <button type="submit" onclick="return validateform()" class="btn btn-primary mb-0">{{ __('Update') }}</button>
                    </div>
                </div>

                {!! Form::close() !!}
                <input type="hidden" name="count" id="count" value="{{ count($user->episodes) }}">
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

    // var podcast_type_value = $('#podcast_type').val();
    // changePodcastType(podcast_type_value);

});

podcast_thumbnail.onchange = evt => {
    const [file] = podcast_thumbnail.files
    if (file) {
        thumbnailPreview.src = URL.createObjectURL(file)
    } else {
        thumbnailPreview.src = "";
    }
}

function validateform() {
    var error = 0;

    const formElement = document.getElementById('editPodcastForm');
    const formElements = formElement.querySelectorAll('input, select, textarea');
    const excludedIds = ['thumbnail','thumbnail1'];
    const thumbnailInput = document.getElementById('thumbnail');
    const thumbnailImage = document.getElementById('imgalert');
        if((!thumbnailInput || !thumbnailInput.value) && (!thumbnailImage || !thumbnailImage.src || thumbnailImage.src.trim() === '')){
            alert("Thumbnail image is required.")
            return false;
        }
    const thumbnailInput1 = document.getElementById('thumbnail1');
    const thumbnailImage1 = document.getElementById('imgalert1');
        if((!thumbnailInput1 || !thumbnailInput1.value) && (!thumbnailImage1 || !thumbnailImage1.src || thumbnailImage1.src.trim() === '')){
            alert("Thumbnail image is required.")
            return false;
        }
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
    if (podcast_type == '') {
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
                                class="form-control myTextarea" />
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
                                class="form-control"></textarea>
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
    $("#removehr" + id).remove();
}
</script>
@endpush
