<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>

    <div class="dropdown-menu" x-placement="bottom-start">

    <a href="{{ route('Show-event.show', $eventDetails->id) }}" class=" dropdown-item">
             <i class="ti ti-eye action-btn"></i>{{ __('Show') }}
      </a>
        <a href="{{ route('Show-event.edit', $eventDetails->id) }}" class=" dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>


        <a href="{{ route('Show-event.index') }}" class="dropdown-item  text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $eventDetails->id }}')"><i
                class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['Show-event.destroy', $eventDetails->id], 'id' => 'delete-form-' . $eventDetails->id]) !!}
        {!! Form::close() !!}
    </div>
</div>

