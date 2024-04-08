@extends('layouts.admin')

@section('title', __('Add instagram video link'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('instagram-video.index') }}">{{ __('instagram-video') }}</a></li>
        <li class="breadcrumb-item">{{ __('Add instagram video link') }}
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="section-body">
            {{ Form::model($user, ['route' => ['instagram-video.addlink', $user], 'method' => 'POST']) }}
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
           
                <div class="card  rounded-card-10px py-3">
                    <div class="card-body">
                        <div class="table_respo_cls">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamicTable">  
                                    <tr>
                                        <th>Name English</th>
                                        <th>Name Arabic</th>
                                        <th>Video Link</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>  
                                        <td><input type="text" name="addmore[0][name]" placeholder="Name English" class="form-control" /></td>  
                                        <td><input type="text" name="addmore[0][name_arabic]" placeholder="Name Arabic" class="form-control" /></td>  
                                        <td><input type="text" name="addmore[0][link]" placeholder="Video Link" class="form-control" /></td>    
                                        <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>  
                                    </tr>  
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="d-flex align-items-center justify-content-end px-4 py-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
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
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Name English" class="form-control" /></td><td><input type="text" name="addmore['+i+'][name_arabic]" placeholder="Name Arabic" class="form-control" /></td><td><input type="text" name="addmore['+i+'][link]" placeholder="Video Link" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
    
@endpush
