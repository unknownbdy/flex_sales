@extends('layouts.admin')
<style>
    .table td, .table th{
        border-top: 1px solid #f1f1f1;
    border-bottom: 1px solid #f1f1f1;
    white-space: nowrap;
    padding: 0.7rem 0.75rem;
    font-size: 14px;
    }
    .badge-info {
    display: inline-block;
    padding: 0.35em 0.5em;
    font-size: 0.75em;
    font-weight: 500;
    line-height: 1;
    color: #000;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 7px;
    background-color: aqua;
    font-size: 11px;
    }
    .badge-warning {
    display: inline-block;
    padding: 0.35em 0.5em;
    font-size: 0.75em;
    font-weight: 500;
    line-height: 1;
    color: #000;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 7px;
    background-color: yellow;
    font-size: 11px;
    }
    .badge-default{
    display: inline-block;
    padding: 0.35em 0.5em;
    font-size: 0.75em;
    font-weight: 500;
    line-height: 1;
    color: #ffffff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 7px;
    background-color: orangered;
    font-size: 11px;
    }

    </style>

@section('title', __('Users Mood Tracker'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Users Mood Tracker') }}
        </li>
    </ul>
@endsection
@section('content')


<!-- <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->

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
                                        {{ Form::label('date', __('Mood Track By Month'),['class' => 'col-form-label']) }}
                                        &nbsp;&nbsp;

                                        <div class="d-flex">

                                            <select id='gMonth2' name="month" style="width: 48%;" class="form-control" onchange="show_month()">
                                            <option selected  value='0'>--Select Month--</option>
                                            <option value='1' @if($month==1) selected @endif>Janaury</option>
                                            <option value='2' @if($month==2) selected @endif>February</option>
                                            <option value='3' @if($month==3) selected @endif>March</option>
                                            <option value='4' @if($month==4) selected @endif>April</option>
                                            <option value='5' @if($month==5) selected @endif>May</option>
                                            <option value='6' @if($month==6) selected @endif>June</option>
                                            <option value='7' @if($month==7) selected @endif>July</option>
                                            <option value='8' @if($month==8) selected @endif>August</option>
                                            <option value='9' @if($month==9) selected @endif>September</option>
                                            <option value='10' @if($month==10) selected @endif>October</option>
                                            <option value='11' @if($month==11) selected @endif>November</option>
                                            <option value='12' @if($month==12) selected @endif>December</option>
                                            </select>
                                            &nbsp;&nbsp;

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label"><strong>Moods</strong></label>
                                        <select name="mood" id="inputState" class="form-select">
                                        <option value="0" selected>--Select Moods--</option>

                                        @foreach ($moods as $moodsValue)
                                            <option value="{{$moodsValue['id']}}" @if($moodsValue['id'] == $moodId) selected @endif>{{$moodsValue['name']}}</option>
                                        @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label"><strong>Users</strong></label>
                                        <select name="user" id="inputState" class="form-select">
                                        <option value="0" selected>--Select User--</option>

                                        @foreach ($users as $usersValue)
                                            <option value="{{$usersValue['id']}}" @if($usersValue['id'] == $userIdSelect) selected @endif>{{$usersValue['name']}}</option>
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
      <th scope="col">SHOW DETAILS</th>
      <th scope="col">&nbsp;</th>

    </tr>
  </thead>
  <tbody>
    @php $i=1 @endphp


    @foreach ($outputArray as $key => $values)

        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$key}}</td>

            <td>
                @php  $j = 1; @endphp
                @foreach ($values as $valuesBitton)
                @if(isset($valuesBitton['id']) && $j==1)
                <button type="button" name="show" class="btn btn-success btn-md" onclick="showHide('{{$valuesBitton['id']}}')" > Show Detail</button>
                @php  $j++; @endphp
                @endif
                @endforeach
        </td>

        </tr>


        @php  $k = 1; @endphp
                @foreach ($values as $valuesBitton)
                @if(isset($valuesBitton['id']) && $k==1)
                <tr style="background-color: aliceblue;display:none" id="showDetail_{{$valuesBitton['id']}}">
                @php  $k++; @endphp
                @endif
                @endforeach
            <td colspan="5">

            <table class="table" border="1">
  <thead>
    <tr>

      <th scope="col">User Name</th>
      <th scope="col">Mood</th>
      <th scope="col">Challange Date</th>
    </tr>
  </thead>
  <tbody style="background-color: #fff;">
    @php  $blankDateArray = []; $elsevar = 0;  $arrayCount1 = []; $j=0; $k=0; $arrayCount2 = []; @endphp
    @foreach ($values as $keyVal => $detailValues)

        @if(!empty($detailValues))
            @if($elsevar==1)
                @php $elsevar = 0; @endphp
                    <div>{{date('d F Y',strtotime($detailValues['date']. ' -1 day'))}}  </div></div></th>
                </tr>
            @endif
            @php $elsevar = 0; @endphp

                <!-- @if(isset($detailValues['date']))  -->
                    @php  $arrayCount1[] = $j++;  @endphp
                <!-- @endif -->
        <tr>
            <td>{{$detailValues['name']}}</td>
            <td><p class="badge-info" >{{$detailValues['main_mood']}}</p>&nbsp;&nbsp;  -  &nbsp;&nbsp;<p class="badge-warning">{{$detailValues['sub_mood']}}</p>&nbsp;&nbsp;  -  &nbsp;&nbsp;<p class="badge-default">{{$detailValues['sub_cat_mood']}}</p></td>
            <td>{{date('d M Y',strtotime($detailValues['date']))}}</td>

        </tr>
        @else
            @if($elsevar==0)
            @php $elsevar = 1; @endphp
            <tr>
                <th scope="row" style="background-color: #f7f7f7;" colspan="4">
                <div style="display: flex;gap: 12px; width: 100%;">
                <div>
                {{date('d',strtotime($keyVal))}} &nbsp; -
                </div>
                <?php
                 $arrayCount2[] = $k++;
                 $blankDateArray['date'] = date('Y-m-d',strtotime($keyVal));
       ?>
            @endif

        @endif
@endforeach

@if(count($arrayCount2)>count($arrayCount1))
    <?php
        $year = date('Y',strtotime($blankDateArray['date']));
        $month = date('m',strtotime($blankDateArray['date']));
        $lastDate = new DateTime();
        $lastDate->setDate($year, $month, 1);
        $lastDate->modify('last day of this month');
        echo $lastDate->format('d F Y');
    ?>
@endif
  </tbody>
  </table>
            </td>
        </tr>

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
       if (displayValue == 'none') {
            document.getElementById(showDetail).style.display = '';
            event.target.innerText = 'Hide Details';
        } else {
            document.getElementById(showDetail).style.display = 'none';
            event.target.innerText = 'Show Details';
        }

    }
 </script>
