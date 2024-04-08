@extends('layouts.admin')

@section('title', __('Add Challenge'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('Challenge.index') }}">{{ __('Challenge') }}</a></li>
        <li class="breadcrumb-item">{{ __('Add Challenge') }}
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="section-body">
            {{ Form::model($user, ['route' => ['Challenge.addlink', $user], 'method' => 'POST']) }}
            {{-- <form action="{{ route('addmorePost') }}" method="POST"> --}}
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
           
                <table class="table table-bordered" id="dynamicTable">  
                    <tr>
                        <th>Title English</th>
                        <th>Title Arabic</th>
                        <th>Video Link</th>
                        <th>Day</th>
                        <th>Video point</th>
                        <th>Action</th>
                    </tr>
                    <tr>  
                        <td><input type="text" name="addmore[0][title_english]" placeholder="title English" class="form-control" /></td>  
                        <td><input type="text" name="addmore[0][title_arabic]" placeholder="title Arabic" class="form-control" /></td>  
                        <td><input type="text" name="addmore[0][video_link]" placeholder="Video Link" class="form-control" /></td>  
                        <td><input type="number" name="addmore[0][day]" placeholder="day" class="form-control" /></td>  
                        <td><input type="number" name="addmore[0][point]" placeholder="point" class="form-control" /></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>  
                    </tr>  
                </table> 
            
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
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
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][title_english]" placeholder="Title English" class="form-control" /></td><td><input type="text" name="addmore['+i+'][title_arabic]" placeholder="Title Arabic" class="form-control" /></td><td><input type="text" name="addmore['+i+'][video_link]" placeholder="Video Link" class="form-control" /></td><td><input type="number" name="addmore['+i+'][day]" placeholder="day" class="form-control" /></td><td><input type="number" name="addmore['+i+'][point]" placeholder="point" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
    
@endpush
