@extends('layouts.admin')
<style>
    .table td, .table th{
        border-top: 1px solid #f1f1f1;
    border-bottom: 1px solid #f1f1f1;
    white-space: nowrap;
    padding: 0.7rem 0.75rem;
    font-size: 14px;
    }
</style>
@section('title', __('User Challenge'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('User Challenge') }}
        </li>
    </ul>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive py-5 pb-4 dropdown_2">
                        <div class="container-fluid">


                        <form action="{{$url}}" id="catform" method="POST" >
                        @csrf
                            <div class="row">
                                <!-- <div class=""> -->
                                    <div class="form-group col-md-12">
                                        {{ Form::label('date', __('Challenge By Date'),['class' => 'col-form-label']) }}
                                        &nbsp;&nbsp;
                                        <input type="checkbox" name="applyDate" value="1" @if($applyDate==1) checked @endif > ( Check for apply date filter )
                                        <div class="d-flex">
                                            {{ Form::label('from', __('From'),['class' => 'col-form-label']) }}
                                            &nbsp;&nbsp;
                                            <input placeholder="From Date" class="form-control" id="from_date" name="from_date" type="date" value="{{$fromDate}}">
                                            &nbsp;&nbsp;
                                            {{ Form::label('to', __('To'),['class' => 'col-form-label']) }}
                                            &nbsp;&nbsp;
                                            <input placeholder="To Date" class="form-control" id="to_date" name="to_date" type="date" value="{{$toDate}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label"><strong>Challenge</strong></label>
                                        <select name="challenge" id="inputState" class="form-select">
                                        <option value="0" selected>Select Challenge</option>

                                        @foreach ($challenge as $challengeValue)
                                            <option value="{{$challengeValue['id']}}"  @if($challengeValue['id'] == $challangeId) selected @endif>{{$challengeValue['title_english']}}</option>
                                        @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label"><strong>Users</strong></label>
                                        <select name="user" id="inputState" class="form-select">
                                        <option value="0" selected>Select User</option>

                                        @foreach ($users as $usersValue)
                                            <option value="{{$usersValue['id']}}" @if($usersValue['id'] == $userId) selected @endif>{{$usersValue['name']}}</option>
                                        @endforeach

                                        </select>
                                    </div>
                                <!-- </div> -->
                            </div>


                            <div class="row mt-4 mb-4 justify-content-center">
                                <div class="col-12 text-center">
                                    <button type="submit"class="btn btn-warning">Search</button>
                                </div>
                            </div>
                        </form>



                             <table class="table" border="1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
      <th scope="col">Challenge Name</th>
      <th scope="col">Challenge Created Date</th>
      <th scope="col">Show Details</th>
    </tr>
  </thead>
  <tbody>
    @php $i=1 @endphp

    @foreach ($userChallenges as $values)

    @if(!empty($values->toArray()['user_challenge_videos']))

        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$values->toArray()['user_challenge_videos'][0]['user_name']}}</td>
            <td>{{$values['title_english']}}</td>
            <td>{{date('Y-m-d',strtotime($values['created_at']))}}</td>
            <td>
                <button type="button" name="show" class="btn btn-success btn-md" onclick="showHide('{{ $values['id'] }}')" >Show Detail</button>
            </td>
        </tr>
        <tr style="background-color: rgb(253, 253, 253);display:none" id="showDetail_{{$values['id']}}">
            <td colspan="5">

            <table class="table" border="1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
      <th scope="col">Video Name</th>
      <th scope="col">Day</th>
      <th scope="col">Is Completed</th>
      <th scope="col">Challange Date</th>
    </tr>
  </thead>
  <tbody style="background-color: #fff;">
    @php $i=1 @endphp

    @foreach ($values->toArray()['user_challenge_videos'] as $detailValues)
        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$detailValues['user_name']}}</td>
            <td>{{$detailValues['challenge_video_name']}}</td>
            <td>{{$detailValues['day']}}</td>
            <td> @php
                   $is_completed = 'Complete';
                   @endphp
                    @if($detailValues['completed']==0)
                        @php
                            $is_completed = 'Pending';
                        @endphp
                    @endif


            {{$is_completed}}</td>
            <td>{{date('Y-m-d',strtotime($detailValues['created_at']))}}</td>

        </tr>
     @endforeach


  </tbody>
  </table>
            </td>
        </tr>
        @endif
        @endforeach

  </tbody>
</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
 <script>
    function showHide(id) {

        var showDetail = 'showDetail_'+id;
       // alert(showDetail);

        const myElement = document.getElementById(showDetail);
        const displayValue = window.getComputedStyle(myElement).display;
       // alert(displayValue);
       if(displayValue=='none'){
        document.getElementById(showDetail).style.display='';
        event.target.innerText = 'Hide Details';
       }
      else{
        document.getElementById(showDetail).style.display='none';
        event.target.innerText = 'Show Details';
       }

    }
 </script>
