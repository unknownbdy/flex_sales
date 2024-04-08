@extends('layouts.admin')
@section('title', __('Create Course'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('Course-video.index') }}">{{ __('Course') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create Course') }}</li>
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
                    <h5> {{ __('Create Courses') }}</h5>
                </div>
                {!! Form::open(['route' => 'Course-video.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id'=>'createCoursetForm']) !!}
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
                        {!! Form::text('sub_title_arabic', null, ['placeholder' => __('Sub Title English'), 'class' => 'form-control']) !!}
                    </div>
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
                            <label for="references_course_ids" class="col-form-label">References Course</label>
                            <select class="form-control select2" multiple="" name="references_course_ids[]" id="references_course_ids">
                                @foreach ($course as $reference)
                                <option value="{{ $reference->id }}">
                                    {{ $reference->course_name }} ( {{ $reference->course_name_arabic }} )
                                </option>
                                @endforeach
                            </select>
                        </div>

                    <div class="form-group">
                        {{ Form::label('description', __('Description English'),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                            {!! Form::textarea('description', null, ['placeholder' => __('Description English'), 'class' => 'form-control myTextarea']) !!}
                        </div>
                        <!-- {!! Form::textarea('description', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control']) !!} -->
                    </div>
                    <div class="form-group">
                        {{ Form::label('description_arabic', __('Description Arabic'),['class' => 'col-form-label']) }}
                        <div class="mb-3">
                            {!! Form::textarea('description_arabic', null, ['placeholder' => __('Description Arabic'), 'class' => 'form-control myTextarea']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="choose-file">
                            <div for="avatar">
                                <label class="form-label">{{ __('Choose Course thumbnail') }}</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" data-filename="thumbnail" accept="image/*">
                            </div>
                            <p class="thumbnail"></p>
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

                <div class="row">
                    <div class="col-md-12 table_respo_cls">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>Name English</th>
                                <th>Name Arabic</th>
                                <th>Video Link</th>
                                <th width=120>Point</th>
                                <th>Chapter </th>
                                <th width=100>Action</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="addmore[0][name]" id="addmore[0][name]" placeholder="Name English" class="form-control" /></td>
                                <td><input type="text" name="addmore[0][name_arabic]" id="addmore[0][name_arabic]" placeholder="Name Arabic" class="form-control" /></td>
                                <td><input type="text" name="addmore[0][link]" id="addmore[0][link]" placeholder="Video Link" class="form-control" /></td>
                                <td><input type="text" name="addmore[0][points]" id="addmore[0][points]"  placeholder="Points" class="form-control" /></td>
                                <td><select name="addmore[0][chapter_id]" id="chapter_id" style="width: 150px;" class="form-control chapter_id">
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
                </div>

                </div>
                <div class="card-footer" style="padding: 10px 0px !important;">
                    <div class="d-flex align-items-center justify-content-end gap-2 px-4 py-1">
                        <a href="{{ route('Course-video.index') }}" class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
                        <button type="submit" onclick="return validateform()" class="btn btn-primary mb-0">{{ __('Save') }}</button>
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

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" id="addmore['+i+'][name]" placeholder="Name English" class="form-control" /></td><td><input type="text" name="addmore['+i+'][name_arabic]" id="addmore['+i+'][name_arabic]" placeholder="Name Arabic" class="form-control" /></td><td><input type="text" name="addmore['+i+'][link]"  id="addmore['+i+'][link]" placeholder="Video Link" class="form-control" /></td><td><input type="text" name="addmore['+i+'][points]" id="addmore['+i+'][points]" placeholder="Points" class="form-control" /></td><td><select name="addmore['+i+'][chapter_id]" id="chapter_id" class="form-control chapter_id"> <option disable style="width: 150px;" selected >select chapter</option>@foreach($role as $item)<option value="{{ $item->id }}">{{ $item->name}}</option>@endforeach</select></div></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>

<script>
        CKEDITOR.editorConfig = function (config) {
            config.language = 'en';
            config.uiColor = '#F7B42C';
            config.height = 300;
            config.toolbarCanCollapse = true;
        };
        CKEDITOR.replace('editor2');

        // ANADE IMG ON CLICK
        var brandImg = document.querySelectorAll("#brand-img img");

        for (var i = 0; i < brandImg.length; i++) {if (window.CP.shouldStopExecution(1)){break;}
            ckEdiloop = brandImg[i];
            ckEdiloop.addEventListener("click", function(el){
                ckEdImg = '<p><img src="'+this.src+'" /></p>'; // La forma como las imágenes son envueltas en ckEditor
                CKEDITOR.instances['editor2'].insertHtml(ckEdImg) // Añade img al editor
            });
        }
        window.CP.exitedLoop(1);
    </script>
<script>
function validateform() {
var error = 0;
const formElement = document.getElementById('createCoursetForm');
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
</script>

@endpush
