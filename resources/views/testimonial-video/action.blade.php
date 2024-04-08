<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <a href="{{ route('testimonial-video.show', $testimonialVideo->id) }}" class=" dropdown-item">
             <i class="ti ti-eye action-btn"></i>{{ __('Show') }} 
      </a>
        <a href="{{ route('testimonial-video.edit', $testimonialVideo->id) }}" class=" dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>
         {{-- <a href="{{ route('testimonial-video.createlinks', $testimonialVideo->id) }}" class=" dropdown-item">
            <i class="ti ti-plus action-btn"></i>{{ __('Add links') }}
        </a>
       <a href="{{ route('testimonial-video.showlinks', $testimonialVideo->id) }}" class=" dropdown-item">
            <i class="ti ti-eye action-btn"></i>{{ __('Show links') }}
        </a> --}}
        {{--  <div class="dropdown-divider"></div>  --}}
        <a href="{{ route('testimonial-video.index') }}" class="dropdown-item  text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $testimonialVideo->id }}')"><i
                class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['testimonial-video.destroy', $testimonialVideo->id], 'id' => 'delete-form-' . $testimonialVideo->id]) !!}
        {!! Form::close() !!}
    </div>
</div>

