<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <a href="{{ route('HandPicked.edit', $HandPicked->id) }}" class=" dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>
        <a href="{{ route('HandPicked.show', $HandPicked->id) }}" class=" dropdown-item">
            <i class="ti ti-eye action-btn"></i>{{ __('show') }}
        </a>
        {{--  <div class="dropdown-divider"></div>  --}}
        <a href="{{ route('HandPicked.index') }}" class="dropdown-item  text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $HandPicked->id }}')"><i
                class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['HandPicked.destroy', $HandPicked->id], 'id' => 'delete-form-' . $HandPicked->id]) !!}
        {!! Form::close() !!}
    </div>
</div>

