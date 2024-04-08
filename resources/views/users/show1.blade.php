@extends('layouts.admin')
@section('title', __('Profile'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('User Profile') }}
    </li>
</ul>
@endsection

@php
use App\Facades\UtilityFacades;
$profile = asset(Storage::url('uploads/avatar/'));
$setting = UtilityFacades::settings();
@endphp

<style>
.course-thumbnail {
    height: 80px;
    width: 100%;
    border-radius: 6px;
    object-fit: cover;

}

.list-group a.active {
    color: #ffffff !important;
}

span.verified {
    background-color: green;
    color: white;
    border: 1px solid;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-info-custom p {
    font-size: 13px;
    font-weight: 300;
}

.tagline-badge-parent span {
    background-color: #41518912;
    color: #415189 !important;
    border-radius: 25px;
    padding: 4px 10px !important;
    font-weight: 600;
    font-size: 12px;
}

.chalenges-card-list-parent button h3 {
    font-size: 16px;
    font-weight: 600;
}

.chalenges-card-list-parent button.active,
.chalenges-card-list-parent button:focus,
.chalenges-card-list-parent button:hover {
    box-shadow: none;
}

.challenge_column h1 {
    font-size: 18px;
    font-weight: 600;
}
.challenge_column p {
    color: #6c757d;
    font-size: 14px;
}

.challenge_column {
    border-radius: 10px !important;
    border: 1px solid #f5f5f5 !important;
}
</style>

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-3">
                <div class="card sticky-top rounded-card-10px">
                    <div class="list-group list-group-flush" id="useradd-sidenav">
                        <a class="list-group-item list-group-item-action nav-link active" id="Profile-tab"
                            data-bs-toggle="tab" data-bs-target="#Profile" type="button" role="tab"
                            aria-controls="Profile" aria-selected="true">Profile
                            <div class="float-end"></div>
                        </a>
                        <a class="list-group-item list-group-item-action nav-link" id="Courses-tab" data-bs-toggle="tab"
                            data-bs-target="#Courses" type="button" role="tab" aria-controls="Courses"
                            aria-selected="true">Courses
                            <div class="float-end"></div>
                        </a>
                        <a class="list-group-item list-group-item-action nav-link" id="Challenges-tab"
                            data-bs-toggle="tab" data-bs-target="#Challenges" type="button" role="tab"
                            aria-controls="Challenges" aria-selected="true">Challenges
                            <div class="float-end"></div>
                        </a>
                        <!-- <a class="list-group-item list-group-item-action nav-link" id="mood-tab" data-bs-toggle="tab"
                            data-bs-target="#mood" type="button" role="tab" aria-controls="mood"
                            aria-selected="true">Mood Report
                            <div class="float-end"></div>
                        </a> -->
                        <a class="list-group-item list-group-item-action nav-link" id="Wishlist-tab"
                            data-bs-toggle="tab" data-bs-target="#Wishlist" type="button" role="tab"
                            aria-controls="Wishlist" aria-selected="true">Wishlist
                            <div class="float-end"></div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-xl-9">
                <div id="useradd-1" class="card bg-primary text-white rounded-card-10px">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-3">
                            @if($user->profile_image)
                                <img src="{{ asset($user->profile_image) }}"
                                    alt="User Profile" class="img-user wid-80 rounded-circle">
                            @else
                                <img src="{{url('/storage/uploads/avatar/userdefaultimage.jpg')}}"
                                    alt="kal" class="img-user wid-80 rounded-circle">
                                @endif
                            </div>
                            <div class="d-block d-sm-flex align-items-center justify-content-between w-100">
                                <div class="mb-3 mb-sm-0">
                                    <h4 class="mb-1 text-white">{{ $user->name }}</h4>
                                    <p class="mb-0 text-sm">User</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Profile" role="tabpanel" aria-labelledby="Profile-tab">
                        <div class="card rounded-card-10px">
                            <div class="card-header">
                                <h5>{{ __('Basic Info') }}</h5>
                                <div class="profile-info-badges d-flex align-items-center mt-3 gap-1">
                                @if($user->userOtp && $user->userOtp->count() > 0)
                                    @if($user->userOtp->first()->is_verified)
                                        <span class="badge bg-success rounded-pill">Email verified</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill">Email not verified</span>
                                    @endif
                                @else
                                    <span class="badge bg-danger rounded-pill">Email not verified</span>
                                @endif
                                    &nbsp;
                                    @if($user->is_completed==1)<span class="badge bg-success rounded-pill">Profile is
                                        complete </span>
                                    @else
                                    <span class="badge bg-danger rounded-pill">Profile is not complete</span>
                                    @endif
                                </div>
                            </div>
                            {{ Form::model($user, ['route' => ['update.profile'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            <div class="card-body">
                                <div class=" row mt-3 container-fluid">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="choose-file">
                                                <label class="form-label">{{ __('Name') }}</label>
                                                <input type="text" disabled readonly class="form-control"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="choose-file">
                                                <label class="form-label">{{ __('Email') }}</label>
                                                <input type="text" disabled readonly class="form-control"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="choose-file">
                                                <label class="form-label">{{ __('Gender') }}</label>
                                                <input type="text" disabled readonly class="form-control"
                                                    value="{{ $user->gender }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="choose-file">
                                                <label class="form-label">{{ __('Age Group') }}</label>
                                                <input type="text" disabled readonly class="form-control"
                                                    value="{{ $user->age }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <strong>prefrences english :</strong>
                                        @foreach($preferences as $tags)
                                        <span class="badge bg-primary rounded-pill">{{ $tags->preferences_name}}</span>
                                        @endforeach
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-sm-12">
                                        <strong>prefrences arabic:</strong>
                                        @foreach($preferences as $tags_arabic)
                                        <span
                                            class="badge bg-primary rounded-pill">{{ $tags_arabic->arbic_preferences_name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Courses" role="tabpanel" aria-labelledby="Courses-tab">
                        <div class="card rounded-card-10px">
                            <div class="card-header">
                                <h5>{{ __('Courses') }}</h5>
                                <small class="text-muted">{{ __('user purchased Courses') }}</small>
                            </div>
                            <div class="card-body">
                                <div class="row row-gap-y py-3">
                                    @foreach($user->purchases as $purchasesKey => $purchase_details)

                                    @if(!empty($purchase_details->toArray()))
                                    @foreach($purchase_details->toArray()['purchase_details'] as $detailKey =>
                                    $detailValue)
                                    <div class="col-6">
                                        <div class="card mb-3 rounded-card-10px p-1 h-100">
                                            <div class="row g-0 p-2">
                                                <div class="col-md-4">
                                                    <img class="course-thumbnail"
                                                        src="{{ asset($detailValue['course']['thumbnail']) }}"
                                                        class="img-fluid rounded" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-info-custom ms-2">
                                                        <h5 class="card-title mb-1">
                                                            {{ $detailValue['course']['course_name'] }} </h5>
                                                        <p class="card-text mb-1">Price :
                                                            Rs. {{ $detailValue['price'] }} <span
                                                                class="text-decoration-line-through text-muted"><strong>Rs.
                                                                    {{ $detailValue['original_price'] }}</strong></span>
                                                        </p>
                                                        <p class="card-text mb-1">Total Lessons :
                                                            {{ count($detailValue['course']['course_links']) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-0">
                                                <div class="col-md-12">
                                                    <div class="p-2">
                                                        <div
                                                            class="tagline-badge-parent d-flex align-items-center flex-wrap gap-2 my-1">
                                                            @foreach ($allPreferences as $preference)
                                                            <?php
                                                            $tag_idArray = explode(',',$detailValue['course']['tag_id']);
                                                            if ($tag_idArray === null) {
                                                                $tag_idArray = [];
                                                            }
                                                            if(in_array($preference->id, $tag_idArray)){
                                                        ?>
                                                            <span class="">{{ $preference->preferences_name }}
                                                                (
                                                                {{ $preference->arbic_preferences_name }} )
                                                            </span>
                                                            <?php  } ?>
                                                            @endforeach
                                                        </div>
                                                        <p class="card-text m-0 mt-2"><small class="text-muted">Purchase
                                                                Date:
                                                                {{ date('d-m-Y',strtotime($detailValue['course']['created_at'])) }}
                                                            </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Challenges" role="tabpanel" aria-labelledby="Challenges-tab">
                        <div class="card rounded-card-10px">
                            <div class="card-header">
                                <h5>{{ __('Challenges') }}</h5>
                                <small class="text-muted">{{ __('Challenges') }}</small>
                            </div>
                            <div class="card-body">
                                <div class="album">
                                    @foreach($user->userchallangeGroup as $key => $challenges)
                                    <div class="col">
                                        <div class="chalenges-card-list-parent">
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item mb-3">
                                                    <div class="accordion-header" id="challenges{{$key}}">
                                                        <button class="accordion-button collapse d-block" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#challengescollapseOne{{$key}}"
                                                            aria-expanded="false"
                                                            aria-controls="challengescollapseOne{{$key}}">
                                                            <h3>{{$challenges['title_english']}}</h3>
                                                            <h3 class="m-0">{{$challenges['title_arabic']}}</h3>
                                                        </button>
                                                    </div>
                                                    <div id="challengescollapseOne{{$key}}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="challenges{{$key}}"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="desc_card-inner border-bottom mb-3">
                                                                <p class="card-text">
                                                                    {!!$challenges['description_english']!!}</p>
                                                                <p class="card-text">
                                                                    {!!$challenges['description_arabic']!!}</p>
                                                            </div>
                                                            <div class="challenges-list-child">
                                                                <div
                                                                    class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-gap-y">

                                                                    @foreach($challenges->challengeDetailLink as
                                                                    $challenges_link )
                                                                    <div class="col">
                                                                        <div
                                                                            class="card shadow-sm challenge_column mb-0 rounded-card-10px p-1 h-100">
                                                                            <div class="card-body py-3">
                                                                               <div class="challenge-card-box">
                                                                                <h1>Day {{ $challenges_link->day}}</h1>
                                                                                    <p class="card-text mb-1">
                                                                                        {{ $challenges_link->title_english}}
                                                                                    <p class="card-text">
                                                                                        {{ $challenges_link->title_arabic}}
                                                                                    </p>
                                                                                    <div
                                                                                        class="d-flex justify-content-between align-items-center">
                                                                                        <div class="btn-group">

                                                                                            <a href="{{ $challenges_link->video_link }}"
                                                                                                target="_blank"
                                                                                                class="btn btn-sm btn-outline-secondary">View</a>
                                                                                        </div>
                                                                                        <small
                                                                                            class="text-muted">{{ date('d-m-Y',strtotime($challenges_link->challenge_video_date)) }}</small>
                                                                                    </div>
                                                                               </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Wishlist" role="tabpanel" aria-labelledby="Wishlist-tab">
                        <div class="card rounded-card-10px">
                            <div class="card-header">
                                <h5>{{ __('Wishlist') }}</h5>
                                <small class="text-muted">{{ __('user Wishlist') }}</small>
                            </div>
                            <div class="card-body">
                                <div class="row row-gap-y py-3">
                                    @foreach($user->wishlists as $wishlistsKey => $wishlists)
                                    <div class="col-6">
                                        <div class="card mb-3 rounded-card-10px p-2 h-100">
                                            <div class="row g-0 p-2">
                                                <div class="col-md-4">
                                                    <img class="course-thumbnail"
                                                        src="{{ asset($wishlists['course']['thumbnail']) }}"
                                                        class="img-fluid rounded" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-info-custom ms-2">
                                                        <h5 class="card-title mb-1">
                                                            {{ $wishlists['course']['course_name'] }} </h5>

                                                        <p class="card-text mb-1">Price :
                                                            Rs. {{ $wishlists['course']['price'] }} <span
                                                                class="text-decoration-line-through text-muted"><strong>Rs.
                                                                    {{ $wishlists['course']['actual_price'] }}</strong></span>
                                                        </p>

                                                        <p class="card-text mb-1">Total Lessons :
                                                            {{ count($wishlists->toArray()['course']['course_links']) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-0">
                                                <div class="col-md-12">
                                                    <div class="p-2">
                                                        <div
                                                            class="tagline-badge-parent d-flex align-items-center flex-wrap gap-2 my-1">
                                                            @foreach ($allPreferences as $preference)
                                                            <?php
                                                            $tag_idArray = explode(',',$wishlists['course']['tag_id']);
                                                            if ($tag_idArray === null) {
                                                                $tag_idArray = [];
                                                            }
                                                            if(in_array($preference->id, $tag_idArray)){
                                                        ?>
                                                            <span class="">{{ $preference->preferences_name }}
                                                                (
                                                                {{ $preference->arbic_preferences_name }} )
                                                            </span>
                                                            <?php  } ?>
                                                            @endforeach
                                                        </div>
                                                        <p class="card-text m-0 mt-2"><small class="text-muted">Purchase
                                                                Date:
                                                                {{ date('d-m-Y',strtotime($wishlists['course']['created_at'])) }}
                                                            </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@push('scripts')
{{-- <script src="{{ asset('vendor/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/croppie/js/croppie.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('vendor/sweetalert/js/sweetalert.min.js') }}"></script>

<script src="{{ asset('vendor/js/custom.js') }}"></script> --}}


<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

<script>
$(document).on("click", ".useradd-1", function() {
    $(".useradd-1").addClass("active");
    $(".useradd-2").removeClass("active");
    $(".useradd-3").removeClass("active");
});

$(document).on("click", ".useradd-2", function() {
    $(".useradd-1").removeClass("active");
    $(".useradd-2").addClass("active");
    $(".useradd-3").removeClass("active");
});

$(document).on("click", ".useradd-3", function() {
    $(".useradd-1").removeClass("active");
    $(".useradd-2").removeClass("active");
    $(".useradd-3").addClass("active");
});
</script>
@endpush
