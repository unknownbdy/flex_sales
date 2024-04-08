<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <a href="{{ route('Course-video.edit', $coursesVideo->id) }}" class=" dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>
        <a href="{{ route('Course-video.show', $coursesVideo->id) }}" class=" dropdown-item">
            <i class="ti ti-eye action-btn"></i>{{ __('show') }}
        </a>
        <a href="{{ route('Course-video.createlinks', $coursesVideo->id) }}" class=" dropdown-item">
            <i class="ti ti-plus action-btn"></i>{{ __('Add Chapter/Lessons') }}
        </a>
        <a href="{{ route('Course-video.showlinks', $coursesVideo->id) }}" class=" dropdown-item">
            <i class="ti ti-eye action-btn"></i>{{ __('Show Chapter/Lessons') }}
        </a>
        {{--  <div class="dropdown-divider"></div>  --}}
        <a href="{{ route('Course-video.index') }}" class="dropdown-item  text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $coursesVideo->id }}')"><i
                class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['Course-video.destroy', $coursesVideo->id], 'id' => 'delete-form-' . $coursesVideo->id]) !!}
        {!! Form::close() !!}
    </div>
</div>

