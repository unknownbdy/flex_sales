@extends('layouts.admin')

@section('title', __('Edit Course Video'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('Course-video.index') }}">{{ __('Course Video') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit Course Video') }}
    </li>
</ul>
@endsection

@section('content')
<style>
    .pagination{
        margin-bottom: 0px;
    }
</style>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Edit Course Video') }}</h5>
                    {{-- {{($user->title)}} --}}
                </div>
                {{ Form::model($user, ['route' => ['Course-video.update', $user->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data','id'=>'editCoursetForm']) }}
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('course_name', __('Course Name English'),['class' => 'col-form-label']) }}
                        {!! Form::text('course_name', null, ['placeholder' => __('Course Name English'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('course_name_arabic', __('Course Name Arabic'),['class' => 'col-form-label']) }}
                        {!! Form::text('course_name_arabic', null, ['placeholder' => __('Course Name Arabic'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            {{ Form::label('sub_title', __('Sub Title English'),['class' => 'col-form-label']) }}
                            {!! Form::text('sub_title', null, ['placeholder' => __('Sub Title English'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col">
                            {{ Form::label('sub_title_arabic', __('Sub Title Arabic'),['class' => 'col-form-label']) }}
                            {!! Form::text('sub_title_arabic', null, ['placeholder' => __('Sub Title Arabic'), 'class' => 'form-control']) !!}
                        </div>
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
                            <label for="references_course_ids" class="col-form-label">References Course</label>
                            <select class="form-control select2" multiple="" name="references_course_ids[]" id="references_course_ids">
                                @foreach ($course as $reference)
                                    <?php
                                        // Initialize the $courseidsArray variable as an empty array
                                        $courseidsArray = [];
                                        if (!empty($user->references_course_ids)) {
                                            // If $user->references_course_ids is not empty, explode it into an array
                                            $courseidsArray = explode(',', $user->references_course_ids);
                                        }
                                    ?>
                                    <option value="{{ $reference->id }}"
                                        {{ in_array($reference->id, $courseidsArray) ? 'selected' : '' }}>
                                        {{ $reference->course_name }} ({{ $reference->course_name_arabic }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                        {{ Form::label('description', __('Description English'),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                            {!! Form::textarea('description', null, ['placeholder' => __('Description English'), 'class' => 'form-control myTextarea']) !!}
                        </div>
                        <!-- {!! Form::textarea('description', null, ['placeholder' => __('Description English'), 'class' => 'form-control']) !!} -->
                    </div>
                    <div class="form-group">
                        {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                            {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control myTextarea']) !!}
                        </div>
                        <!-- {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control']) !!} -->
                    </div>
                    <div class="row">
                    <div class="form-group col">
                        <div class="choose-file">
                            <div for="avatar">
                                <label class="form-label">{{ __('Choose thumbnail') }}</label>
                                <input type="file" class="form-control" name="thumbnail" id="thumbnail" data-filename="thumbnail" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col">
                        @if($user->thumbnail)
                        <img src="{{ asset($user->thumbnail) }}" alt="Image" id="thumbnail1"  width="80"
                            height="80" style="border-radius:3px">
                            <input type="hidden" name="hiddenImage" value="{{ $user->thumbnail }}" />
                        @endif
                        </div>
                    </div>

                    <div class="row">
                    <div class="form-group col">
                        {{ Form::label('price', __('Listing Price'),['class' => 'col-form-label']) }}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">د.إ</span>
                            {!! Form::text('price', null, ['placeholder' => __('Listing Price'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group col">
                        {{ Form::label('actual_price', __('Actual Price'),['class' => 'col-form-label']) }}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">د.إ</span>
                        {!! Form::text('actual_price', null, ['placeholder' => __('Actual Price'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="table_respo_cls">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dynamicTable">
                            <thead>
                            <tr>
                                <th>Name English</th>
                                <th>Name Arabic</th>
                                <th>Video Link</th>
                                <th width=120>Point</th>
                                <th>Chapter </th>
                                <th width=100>Action</th>
                            </tr>
                            </thead>
                            @php
                                $serialNumber = ($courselink->currentPage() - 1) * $courselink->perPage();
                            @endphp
                            @foreach($courselink as $index => $row)
                            <tr>
                                <td>
                                    <input type="hidden" name="addmore[{{$index}}][id]" id="addmore[{{$index}}][id]" value="{{ $row->id }}" placeholder="Name English" class="form-control" />
                                    <input type="text" name="addmore[{{$index}}][name]" id="addmore[{{$index}}][name]" value="{{ $row->name }}" placeholder="Name English" class="form-control" />
                                </td>
                                <td><input type="text" name="addmore[{{$index}}][name_arabic]" id="addmore[{{$index}}][name_arabic]" value="{{ $row->name_arabic }}" placeholder="Name Arabic" class="form-control" /></td>
                                <td><input type="text" name="addmore[{{$index}}][link]" id="addmore[{{$index}}][link]" value="{{ $row->link }}" placeholder="Video Link" class="form-control" /></td>
                                <td><input type="text" name="addmore[{{$index}}][points]" value="{{ $row->points }}" placeholder="Points" class="form-control" style="width: 100px;" /></td>
                                <td>
                                    <select name="addmore[{{$index}}][chapter_id]" id="chapter_id" style="width: 150px;" class="form-control chapter_id">
                                        <option disabled selected>select chapter</option>
                                        @foreach($role as $item)
                                            <option value="{{ $item->id }}" {{ $row->chapter_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                            @if($row['deleted_at']!="")
                                        <a href="{{ route('Course-video.restore' , ['id' => $row['id']]) }}" class="btn btn-success"
                                            onclick="return confirm('Are you sure you want to restore this item?');">restore</a>
                                            @else
                                            <a href="{{ route('Course-video.destroy-custom' , ['id' => $row['id']]) }}" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?');">delete</a>
                                            @endif
                                    <!-- <div style="display: flex;width: 155px;">
                                        <a href="{{ route('Course-video.destroy-custom' , ['id' => $row['id']]) }}"  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">delete</a> -->
                                </div>
                                </td>
                                <!-- <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td> -->
                                <!-- <td> <button type="button"  name="add" id="{{$index}}" class="btn btn-danger remove-tr">Remove</button></td> -->



                            </tr>
                            @endforeach
                        <tr>
                            <td><input type="text" name="addmore[{{ $highestIndex + 1 }}][name]" placeholder="Name English" class="form-control" /></td>
                            <td><input type="text" name="addmore[{{ $highestIndex + 1 }}][name_arabic]" placeholder="Name Arabic" class="form-control" /></td>
                            <td><input type="text" name="addmore[{{ $highestIndex + 1 }}][link]" placeholder="Video Link" class="form-control" /></td>
                            <td><input type="text" name="addmore[{{ $highestIndex + 1 }}][points]" placeholder="Points" class="form-control" /></td>
                            <td><select name="addmore[{{ $highestIndex + 1 }}][chapter_id]" id="chapter_id" style="width: 150px;" class="form-control chapter_id">
                                    <option disable selected>select chapter</option>
                                    @foreach($role as $item)
                                    <option value="{{ $item->id }}">{{ $item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>
                        </tr>
                        </table>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-end py-4">
                    <div>{{ $courselink->links('pagination::bootstrap-4') }}</div>
                </div>

                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <!-- <div style="">{{ $courselink->links('pagination::bootstrap-4') }}</div> -->
                <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end px-4 py-1 gap-2">
                        <a href="{{ route('Course-video.index') }}" class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
                        <button type="submit" onclick="return validateform()" class="btn btn-primary mb-0">{{ __('Update') }}</button>
                    </div>
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
</script>
<script type="text/javascript">
    var i = 0;
    $("#add").click(function(){
        var currentIndex = '{{ $highestIndex + 1 }};'

        ++currentIndex;

        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+currentIndex+'][name]" placeholder="Name English" class="form-control" /></td><td><input type="text" name="addmore['+currentIndex+'][name_arabic]" placeholder="Name Arabic" class="form-control" /></td><td><input type="text" name="addmore['+currentIndex+'][link]" placeholder="Video Link" class="form-control" /></td><td><input type="text" name="addmore['+currentIndex+'][points]" placeholder="Points" class="form-control" /></td><td><select name="addmore['+currentIndex+'][chapter_id]" id="chapter_id" class="form-control chapter_id"> <option disable style="width: 150px;" selected >select chapter</option>@foreach($role as $item)<option value="{{ $item->id }}">{{ $item->name}}</option>@endforeach</select></div></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });

        $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
        });
</script>
    <script>
    function validateform() {
    var error = 0;

    const formElement = document.getElementById('editCoursetForm');
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
                var Label = document.querySelector("label[for='"+id+"']");
                Label.style.color = 'red';
                var invalidField = document.getElementById(id);
                invalidField.focus();
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
