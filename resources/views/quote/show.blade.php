@extends('layouts.admin')
@section('title', __('Quote'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('quote.index') }}">{{ __('Quote') }}</a></li>
    <li class="breadcrumb-item">{{ __('Quote') }}
    </li>
</ul>
@endsection

@section('content')
<!-- <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('quote.index') }}"> Back</a>
</div> -->
<div class="row">
        <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Chapter/Lesson Detail') }}</h5>
                </div> 
            <div class="card-body shoe-boot-tbl">

<table id="showBooksIn" class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <td>{{$quote['id']}}</td>
        </tr>
        <tr>
            <th>title</th>
            <td>{{$quote['title']}}</td>
        </tr>
        <tr>
            <th>Refrence Podcast</th>
            <td style="white-space: inherit;">
            <?php 
                $breakArray = explode(',',$podcastStr);
                // print_r($breakArray);
               foreach($breakArray as $breakArrayval){
                if($breakArrayval!=''){
                    ?>
                    <span class="badge badge-primary"> {{$breakArrayval}}</span>
                    <?php
                 } }
            ?>    
           </td>
        </tr>
       
        <tr>
            <th>images</th>
            <td>
                <img src="{{ asset($quote['image']) }}" class="img-responsive" style="height: 150px; width:150px">
            </td>
        </tr>
    </thead>
</table>

</div> 
            <div class="card-footer">
                    <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('quote.index') }}"> Back</a>
                    </div>
                </div>
        </div></div></div></div>
 
@endsection

@push('style')
@include('layouts.includes.datatable_css')

@endpush