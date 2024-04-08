<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>

    <div class="dropdown-menu" x-placement="bottom-start">
        {{-- <a href="{{ route('instagram-video.show', $instagramVideo->id) }}" class=" dropdown-item">
             <i class="ti ti-eye action-btn"></i>{{ __('Show') }} 
      </a> --}}
        <a href="{{ route('Challenge.edit', $Challenge->id) }}" class=" dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>
        <!-- <a href="{{ route('Challenge.createlinks', $Challenge->id) }}" class=" dropdown-item">
            <i class="ti ti-plus action-btn"></i>{{ __('Add Days') }}
        </a> -->
        <a href="{{ route('Challenge.showlinks', $Challenge->id) }}" class=" dropdown-item">
            <i class="ti ti-eye action-btn"></i>{{ __('View') }}
        </a>
        {{--  <div class="dropdown-divider"></div>  --}}
        <a href="{{ route('Challenge.index') }}" class="dropdown-item  text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $Challenge->id }}')"><i
                class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE','route' => ['Challenge.destroy', $Challenge->id], 'id' => 'delete-form-' . $Challenge->id]) !!}
        {!! Form::close() !!}
    </div>
</div>

