@extends('layouts.admin')
@section('title', __('Challenge'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('Challenge.index') }}">{{ __('Challenge') }}</a></li>
    <li class="breadcrumb-item">{{ __('Challenge View') }}
    </li>
</ul>
@endsection



@section('content')

<div class="row">
    <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Challenge Details') }}</h5>
                </div>
                <div class="card-body">
            <div class="table_respo_cls">
                <div class="table-responsive">
                <table id="showBooksIn" class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 250px;">Title English</th>
                                <td><strong>{{$data->title_english}}</strong></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Title Arabic</th>
                                <td><p>{!!$data->title_arabic!!}</p></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Prefrences</th>
                                <td>
                                    @foreach($data->tags as $prefrences)
                                    <span class="badge bg-primary">{{$prefrences['preferences_name']}}</span>
                                    @endforeach
                                 </td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Prefrences Arabic</th>
                                <td><p>
                                    @foreach($data->tags as $prefrences)
                                    <span class="badge bg-primary">{{$prefrences['arbic_preferences_name']}}</span>
                                    @endforeach
                                </p></td>
                            </tr>



                            <tr>
                                <th style="width: 250px;">Description English</th>
                                <td><p>{!!$data->description_english!!}</p></td>
                            </tr>
                            <tr>
                                <th style="width: 250px;">Description Arabic</th>
                                <td><p>{!!$data->description_arabic!!}</p></td>
                            </tr>

                        <tbody>
                </table>

                @if(!empty(($data->toArray()['challenge_links'])))
                    <table id="showBooksIn" class="table table-bordered" style="width: auto;">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th style="width: 250px;">Title Englsih</th>
                                <th style="width: 250px;">Title Arabic</th>
                                <th style="width: 250px;">TV Show</th>
                                <th style="width: 250px;">Channel</th>
                                <th style="width: 250px;">Image</th>
                                <!-- <th>Video link</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>


                        @foreach($data->toArray()['challenge_links'] as $key =>$row)
                        <tr>
                            <td>{{$row['day']}}</td>
                            <td class="row-break">{{$row['title_english']}}</td>

                            <td class="row-break">{{$row['title_arabic']}}</td>


                            <td class="row-break">{{$row['tv_show_name']}}</td>

                            <td class="row-break">{{$row['channel_name']}}</td>

                            <td>
                            <div class="thumbnail-container">
                            @if ( $row['thumbnail'])
                                <img class="thumbnail-image" src="{{ asset('/' . $row['thumbnail']) }}" alt="Thumbnail"  width="50"
                                                        height="50" style="border-radius:3px">
                            @endif
                            </div>
                            </td>
                            <!-- <td><div style="width: 400px;word-break: break-all;white-space: normal;">{{$row['video_link']}}</div> </td> -->
                            <!-- <td>{{strlen($row['video_link']) > 45 ? substr($row['video_link'], 0, 45) . '...' : $row['video_link']}}</td> -->
                            <td style="width: 200px !important;">
                                <a href="{{$row['video_link']}}" target="_blank" class="btn btn-info"
                                    rel="noopener noreferrer">play</a>
                                    @if($row['deleted_at']!="")
                                <a href="{{ route('Challenge.restore' , ['id' => $row['id']]) }}" class="btn btn-success"
                                    onclick="return confirm('Are you sure you want to restore this item?');">restore</a>
                                    @else
                                    <a href="{{ route('Challenge.delete' , ['id' => $row['id']]) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item?');">delete</a>
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @endif

                </div>
            </div>

                </div>
                <div class="card-footer" style="padding: 10px 0px !important;">
                            <div class="d-flex align-items-center justify-content-end px-4 py-1 gap-2">
                                <a href="{{ route('Challenge.index') }}" class="btn btn-secondary mb-0">{{ __('Back') }}</a>
                                <!-- <button type="submit" onclick="return validateform()" class="btn btn-primary mb-3">{{ __('Save') }}</button> -->
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>



<script>
  // Assuming you have included a JavaScript library like jQuery for easier DOM manipulation

  // Example: Open image in a lightbox/modal when clicked
  $(document).ready(function() {
    $('.thumbnail-image').click(function() {
      var imageUrl = $(this).attr('src');
      var modalContent = '<img src="' + imageUrl + '" alt="Full Image">';

      // Create and show a modal
      var modal = $('<div class="modal">').appendTo('body');
      modal.append(modalContent);
      modal.click(function() {
        $(this).remove();
      });
    });
  });
</script>

@endsection

@push('style')
@include('layouts.includes.datatable_css')

@endpush
