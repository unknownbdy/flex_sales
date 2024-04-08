<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <a href="{{ route('podcast-video.show', $podcastVideo->id) }}" class=" dropdown-item">
             <i class="ti ti-eye action-btn"></i>{{ __('Show') }}
      </a>
        <a href="{{ route('podcast-video.edit', $podcastVideo->id) }}" class=" dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>
        {{--  <div class="dropdown-divider"></div>  --}}
        <a href="{{ route('podcast-video.index') }}" class="dropdown-item  text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $podcastVideo->id }}')"><i
                class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['podcast-video.destroy', $podcastVideo->id], 'id' => 'delete-form-' . $podcastVideo->id]) !!}
        {!! Form::close() !!}
    </div>
</div>

