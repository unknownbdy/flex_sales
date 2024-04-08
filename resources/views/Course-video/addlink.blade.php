@extends('layouts.admin')

@section('title', __('Add Course Video'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('Course-video.index') }}">{{ __('Course-video') }}</a></li>
        <li class="breadcrumb-item">{{ __('Add Course-video') }}
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card  rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Create Courses') }}</h5>
                </div>
            {{ Form::model($user, ['route' => ['Course-video.addlink', $user], 'method' => 'POST']) }}
            <div class="card-body">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <div class="table_respo_cls">
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
                                <td><input type="text" name="addmore[0][name]" placeholder="Name English" class="form-control" /></td>
                                <td><input type="text" name="addmore[0][name_arabic]" placeholder="Name Arabic" class="form-control" /></td>
                                <td><input type="text" name="addmore[0][link]" placeholder="Video Link" class="form-control" /></td>
                                <td><input type="text" name="addmore[0][points]" placeholder="Points" class="form-control" /></td>
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

                <div class="card-footer d-flex align-items-center justify-content-end px-0" style="padding: 10px 0px !important;">
                    <div class="">
                        <a href="{{ route('Course-video.index') }}" class="btn btn-secondary mb-0">{{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary mb-0">{{ __('Save') }}</button>
                       
                    </div>
                </div>

                
            </div>
            </form>
            </div>
        </div>
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
@endpush
@push('scripts')
<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Name English" class="form-control" /></td><td><input type="text" name="addmore['+i+'][name_arabic]" placeholder="Name Arabic" class="form-control" /></td><td><input type="text" name="addmore['+i+'][link]" placeholder="Video Link" class="form-control" /></td><td><input type="text" name="addmore['+i+'][points]" placeholder="Points" class="form-control" /></td><td><select name="addmore['+i+'][chapter_id]" id="chapter_id" class="form-control chapter_id"> <option disable style="width: 150px;" selected >select chapter</option>@foreach($role as $item)<option value="{{ $item->id }}">{{ $item->name}}</option>@endforeach</select></div></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>

@endpush
