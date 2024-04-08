@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>live video link<video src=""></video></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Challenge.index') }}"> Back</a>
            </div>
        </div>
    </div>    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id:</strong>
                {{ $user->id }}
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name english:</strong>
                {{ $user->name }}
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name Arabic:</strong>
                {{ $user->name_arabic }}
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tag English:</strong>
                {{ $user->tag }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tag Arabic:</strong>
                {{ $user->tag_arabic }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description English:</strong>
                {{ $user->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description Arabic:</strong>
                {{ $user->description_arabic }}
            </div>
        </div>
    </div>
@endsection
