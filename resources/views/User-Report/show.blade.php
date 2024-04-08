@extends('layouts.admin')


@section('content')

    @section('title', __('Show User'))
    @section('breadcrumb')
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
            <li class="breadcrumb-item">{{ __('Show User') }}</li>
        </ul>
    @endsection




        <table id="showBooksIn" class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <!-- <tr>
            <th>Roles</th>
            <td> @if (!empty($user->getRoleNames()))
                    @foreach ($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif</td>
        </tr> -->
        <tr>
            <th>Age</th>
            <td>{{ $user->age }}</td>
        </tr>
        <tr>
            <th>Contact No</th>
            <td>{{ $user->contact_no }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $user->gender }}</td>
        </tr>
        <tr>
    <th>Preferences</th>
    <td>
        @foreach ($preferences as $preference)
            {{ $preference }}@if (!$loop->last), @endif
        @endforeach
    </td>
</tr>
    </thead>
</table>


@endsection
