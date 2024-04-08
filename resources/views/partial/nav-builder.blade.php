@php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$logo = asset(Storage::url('uploads/logo/'));
$settings = Utility::settings();

@endphp
<style>
   .dash-sidebar.light-sidebar .dash-link {
    color: #ffffff !important;
    font-size: 14px !important;
}

.dash-sidebar.light-sidebar .dash-item.active > .dash-link, .dash-sidebar.light-sidebar .dash-item:hover > .dash-link{
    background-color: #ffffff38;
    border-radius: 8px;
    margin-right: 26px;
}

body.theme-1 .dash-sidebar.light-sidebar .dash-navbar > .dash-item.active > .dash-link, body.theme-1 .dash-sidebar.light-sidebar .dash-navbar > .dash-item:active > .dash-link, body.theme-1 .dash-sidebar.light-sidebar .dash-navbar > .dash-item:focus > .dash-link, body.theme-1 .dash-sidebar.light-sidebar .dash-navbar > .dash-item:hover > .dash-link, body.theme-1 .dash-sidebar .dash-navbar > .dash-item.active > .dash-link, body.theme-1 .dash-sidebar .dash-navbar > .dash-item:active > .dash-link, body.theme-1 .dash-sidebar .dash-navbar > .dash-item:focus > .dash-link, body.theme-1 .dash-sidebar .dash-navbar > .dash-item:hover > .dash-link{
    background: #fff;
    color: #000 !important;
    box-shadow: -3px 4px 23px rgba(0, 0, 0, 0.1);
}

body.theme-1 .dash-sidebar.light-sidebar .dash-navbar > .dash-item.active > .dash-link i, body.theme-1 .dash-sidebar.light-sidebar .dash-navbar > .dash-item:active > .dash-link i, body.theme-1 .dash-sidebar.light-sidebar .dash-navbar > .dash-item:focus > .dash-link i, body.theme-1 .dash-sidebar.light-sidebar .dash-navbar > .dash-item:hover > .dash-link i, body.theme-1 .dash-sidebar .dash-navbar > .dash-item.active > .dash-link, body.theme-1 .dash-sidebar .dash-navbar > .dash-item:active > .dash-link i, body.theme-1 .dash-sidebar .dash-navbar > .dash-item:focus > .dash-link i, body.theme-1 .dash-sidebar .dash-navbar > .dash-item:hover > .dash-link i{
    color: #000 !important
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #ffffff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0.125);
    border-radius: 0px;
}
.btn-warning {
    color: #ffffff;
    background-color: #617085;
    border-color: #617085;
}
.btn-success {
    color: #ffffff;
    background-color: #b09b95;
    border-color: #b09b95;
}

.btn-success:hover {
    color: #ffffff;
    background-color: #534343;
    border-color: #534343;
}

.btn-check:checked + .btn-success, .btn-check:active + .btn-success, .btn-success:active, .btn-success.active, .show > .btn-success.dropdown-toggle {
    color: #ffffff;
    background-color: #534343;
    border-color: #534343
}

.btn-check:focus + .btn-success, .btn-success:focus {
    color: #ffffff;
    background-color: #534343;
    border-color: #534343;
    box-shadow: 0 0 0 0.2rem rgb(63 63 63 / 50%);
}
body.theme-1 .progress-bar:not([class*="bg-"]), body.theme-1 .btn-primary {
    color: #ffffff;
    background-color: #ff2883;
    border-color: #ffffff;
}

.dash-sidebar .m-header {
    height: 80px;
    display: flex;
    align-items: center;
    padding: 15px 23px;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #898989;
}

.table-bordered td, .table-bordered th {
    border: 1px solid #b4b1b1
}

.table thead th {
    border-bottom: 1px solid #675b5b;
    font-size: 13px;
    color: #060606;
    background: #f8f9fd;
    text-transform: uppercase;
}
.shoe-boot-tbl table tbody tr td{
    word-break: break-all;
    white-space: normal;
}
.btn{
    text-transform: capitalize;
}

.card:not(.table-card) .table > thead > tr > th {
    border-top: 1px solid;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #050609;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
}
.rounded-card-10px{
    border-radius: 10px !important;
}
.profile-info-badges span {
    font-size: 11px;
    font-weight: 500;
    line-height: 10px;
    padding: 5px 8px;
}
.fs-cs-14px{
    font-size: 14px;
}
.rounded-circle-dash i{
    padding: 15px 0 !important;
}

.row-break{
     word-break: break-all !important;
     white-space: normal !important;
 }
 .dash-sidebar.light-sidebar .dash-hasmenu.active .dash-link .dash-micon,.dash-sidebar.light-sidebar .dash-hasmenu:hover .dash-link .dash-micon {
    background-color: #1c1c2114 !important;
    box-shadow: -3px 4px 23px rgba(0, 0, 0, 0.1);
}
</style>


<!-- [ navigation menu ] start -->
<nav class="dash-sidebar light-sidebar transprent-bg" style="background: #0D0E12;border-right: 1px solid;color: #ffffff;
    font-size: 14px;">
    <div class="navbar-wrapper">
        <div class="m-header justify-content-center">
            <a href="{{ route('home') }}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->


                @if (isset($settings['dark_mode']))
                @if ($settings['dark_mode'] == 'on')
                <img class="c-sidebar-brand-full pt-3 mt-2 mb-1"
                    src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'light_logo.png') }}"
                    height="46" class="navbar-brand-img">
                @else
                <img class="c-sidebar-brand-full pt-3 mt-2 mb-1"
                    src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'insijam-logo.webp') }}"
                    height="80" class="navbar-brand-img">
                    <!-- <p style="
    color: #fff;
    font-size: 21px;
    font-family: auto;
    margin-left: -23px;
    /* box-shadow: 8px 5px 10px -9px; */
    border-radius: 32px;
">INSIJAM</p> -->
                @endif
                @else
                <img class="c-sidebar-brand-full pt-3 mt-2 mb-1"
                    src="http://127.0.0.1:8000/storage/uploads/logo/dark_logo.png" height="46" class="navbar-brand-img">
                @endif
                {{-- <img class="c-sidebar-brand-minimized"
                    src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'small_logo.png') }}"
                height="46" class="navbar-brand-img"> --}}
            </a>
        </div>
        <div class="navbar-content active dash-trigger ps ps--active-y">
            <ul class="dash-navbar" style="display: block;">
                <li class="dash-item dash-hasmenu {{ request()->is('/') ? 'active' : '' }}">
                    <a class="dash-link" href="{{ url('/') }}">
                        <span class="dash-micon"><i class="ti ti-home"></i></span>
                        <span class="dash-mtext custom-weight">{{ __('Dashboard') }}</span>
                    </a>
                </li>


                @can('manage-user')
                <li class="dash-item dash-hasmenu {{ request()->is('users*') ? 'active' : '' }}">
                    <a class="dash-link" href="{{ route('users.index') }}">
                        <span class="dash-micon"><i class="ti ti-user"></i></span>
                        <span class="dash-mtext custom-weight">{{ __('Users') }}</span>
                    </a>
                </li>







                @endcan

                @role('admin')
                <li class="dash-item dash-hasmenu {{ setActiveTab('2fa/Course-video/*') }}">
                    <a class="dash-link" href="{{ route('Course-video.index') }}">
                        <span class="dash-micon"><i class="ti ti-book"></i></span>
                        <span class="dash-mtext custom-weight">{{ __('Courses') }}</span>
                    </a>
                </li>

                <li class="dash-item dash-hasmenu {{ setActiveTab('2fa/Show-event/*') }}">
                    <a class="dash-link" href="{{ route('Show-event.index') }}">
                        <span class="dash-micon"><i class="ti ti-calendar"></i></span>
                        <span class="dash-mtext custom-weight">{{ __('Events') }}</span>
                    </a>
                </li>


                <li class="dash-item dash-hasmenu  {{ setActiveTab('quote/*') }}">
                    <a class="dash-link" href="{{ route('quote.index') }}">
                        <span class="dash-micon"><i class="ti ti-pencil"></i></span>
                        <span class="dash-mtext custom-weight">{{ __('Quotes') }}</span>
                    </a>
                </li>

                <li class="dash-item dash-hasmenu {{ setActiveTab('2fa/Challenge/*') }}">
                    <a class="dash-link" href="{{ route('Challenge.index') }}">
                        <span class="dash-micon"><i class="ti ti-trophy"></i></span>
                        <span class="dash-mtext custom-weight">{{ __('Challenge') }}</span>
                    </a>
                </li>


                @endrole

                <!-- drop down menue start  -->
                <!-- <li class="dash-item dash-hasmenu {{ request()->is('roles*','permission*','modules*') ? 'active' : '' }}" >
                    <a class="btn btn-toggle align-items-center rounded collapsed dash-link text-start" data-bs-toggle="collapse"
                        data-bs-target="#Rights-collapse" aria-expanded="false">
                        <span class="dash-micon"><i class="ti ti-lock"></i></span>Rights
                    </a>
                    <div class="collapse  {{ request()->is('roles*','permission*','modules*') ? 'show' : '' }}" id="Rights-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            @can('manage-role')
                            <li class="dash-item dash-hasmenu {{ request()->is('roles*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('roles.index') }}">
                                    <span class="dash-mtext custom-weight">{{ __('Roles') }}</span>
                                </a>
                            </li>
                            @endcan
                            @can('manage-permission')
                            <li class="dash-item dash-hasmenu {{ request()->is('permission*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('permission.index') }}">
                                    <span class="dash-mtext custom-weight">{{ __('Permissions') }}</span>
                                </a>
                            </li>
                            @endcan
                            @can('manage-module')
                            <li class="dash-item dash-hasmenu {{ request()->is('modules*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('modules.index') }}">
                                    <span class="dash-mtext custom-weight">{{ __('Modules') }}</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> -->

                <li class="dash-item dash-hasmenu menus-inners {{ request()->is('about*','pages*','preferences*','mood*') ? 'active' : '' }}">
                    <a class="btn btn-toggle align-items-center rounded collapsed dash-link text-start" data-bs-toggle="collapse"
                        data-bs-target="#Master-collapse" aria-expanded="false">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="dash-micon"><i class="ti ti-key"></i></span>
                                Master
                                </div>
                                <i class="fa fa-angle-down text-white h-auto collp-close" style="display: none;"></i>
                                <i class="fa fa-angle-up text-white h-auto collp-open" style="display: none;"></i>
                            </div>
                    </a>
                    <div class="collapse {{ request()->is('about*','pages*','preferences*','mood*') ? 'show' : '' }}" id="Master-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            @role('admin')
                            <li class="dash-item dash-hasmenu {{ request()->is('about*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('about.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-notebook"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('About') }}</span>
                                </a>
                            </li>
                            @endcan
                            @role('admin')
                            <li class="dash-item dash-hasmenu {{ request()->is('pages*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('pages.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-squares-filled"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Pages') }}</span>
                                </a>
                            </li>
                            @endcan
                            <li class="dash-item dash-hasmenu {{ request()->is('preferences*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('preferences.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-squares-filled"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Preferences') }}</span>
                                </a>
                            </li>
                            <li class="dash-item dash-hasmenu {{ request()->is('mood*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('mood.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-squares-filled"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Mood') }}</span>
                                </a>
                            </li>
                            <li class="dash-item dash-hasmenu {{ request()->is('faqs*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('faqs.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-squares-filled"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('FAQs') }}</span>
                                </a>
                            </li>
                            <li class="dash-item dash-hasmenu {{ request()->is('contactus*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('contactus.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-squares-filled"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Contact Us') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="dash-item dash-hasmenu menus-inners {{ request()->is('2fa/HandPicked*','2fa/collections*') ? 'active' : '' }}">
                    <a class="btn btn-toggle align-items-center rounded collapsed dash-link text-start" data-bs-toggle="collapse"
                        data-bs-target="#Content-collapse" aria-expanded="false">
                        <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                        <span class="dash-micon"><i class="ti ti-dots-circle-horizontal"></i></span>Content</div>
                        <i class="fa fa-angle-down text-white h-auto collp-close" style="display: none;"></i>
                        <i class="fa fa-angle-up text-white h-auto collp-open" style="display: none;"></i>
                    </div>
                    </a>
                    <div class="collapse  {{ request()->is('2fa/HandPicked*','2fa/collections*') ? 'show' : '' }}" id="Content-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            @role('admin')
                            <li class="dash-item dash-hasmenu {{ request()->is('2fa/HandPicked*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('HandPicked.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-device-tv"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Articles') }}</span>
                                </a>
                            </li>
                            <li class="dash-item dash-hasmenu {{ request()->is('2fa/collections*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('collections.collection') }}">
                                    <span class="dash-mtext custom-weight">{{ __('Collections Videos ') }}</span>
                                </a>
                            </li>
                            @endrole
                        </ul>
                    </div>
                </li>

                <li class="dash-item dash-hasmenu menus-inners {{ request()->is('2fa/instagram-video*','2fa/live-video*','2fa/podcast-video*','2fa/testimonial-video*','2fa/tvinterview-video*','2fa/tvshow-video*') ? 'active' : '' }}">
                    <a class="btn btn-toggle align-items-center rounded collapsed dash-link text-start" data-bs-toggle="collapse"
                        data-bs-target="#Channels-collapse" aria-expanded="false">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="dash-micon"><i class="ti ti-list"></i></span>
                            Channels
                        </div>


                        <i class="fa fa-angle-down text-white h-auto collp-close" style="display: none;"></i>
                        <i class="fa fa-angle-up text-white h-auto collp-open" style="display: none;"></i>
                    </div>
                    </a>
                    <div class="collapse {{ request()->is('2fa/instagram-video*','2fa/live-video*','2fa/podcast-video*','2fa/testimonial-video*','2fa/tvinterview-video*','2fa/tvshow-video*') ? 'show' : '' }}" id="Channels-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            @role('admin')
                            <li class="dash-item dash-hasmenu {{ request()->is('2fa/instagram-video*')  ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('instagram-video.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-brand-instagram"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Instagram Videos') }}</span>
                                </a>
                            </li>
                            <li class="dash-item dash-hasmenu {{ request()->is('2fa/live-video*')  ? 'active' : ''  }} ps-4">
                                <a class="dash-link" href="{{ route('live-video.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-video"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Live Videos') }}</span>
                                </a>
                            </li>
                            <li class="dash-item dash-hasmenu {{ request()->is('2fa/podcast-video*')  ? 'active' : ''  }} ps-4">
                                <a class="dash-link" href="{{ route('podcast-video.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-device-desktop"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Podcast Video') }}</span>
                                </a>
                            </li>
                            <li class="dash-item dash-hasmenu {{ request()->is('2fa/testimonial-video*')  ? 'active' : ''  }} ps-4">
                                <a class="dash-link" href="{{ route('testimonial-video.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-video-plus"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Testimonial Video') }}</span>
                                </a>
                            </li>
                            <li class="dash-item dash-hasmenu {{ request()->is('2fa/tvinterview-video*')  ? 'active' : ''  }} ps-4">
                                <a class="dash-link" href="{{ route('tvinterview-video.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-video-minus"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('TV-Interview') }}</span>
                                </a>
                            </li>
                            <li class="dash-item dash-hasmenu {{ request()->is('2fa/tvshow-video*')  ? 'active' : ''  }} ps-4">
                                <a class="dash-link" href="{{ route('tvshow-video.index') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-device-tv"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('TV-Show') }}</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                <li class="dash-item dash-hasmenu menus-inners {{ request()->is('UserReport*','UserChallenge*','UserMoodReport*') ? 'active' : '' }}">
                    <a class="btn btn-toggle align-items-center rounded collapsed dash-link text-start" data-bs-toggle="collapse"
                        data-bs-target="#User-collapse" aria-expanded="false">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="dash-micon"><i class="ti ti-file-check"></i></span>
                                Reports
                            </div>

                            <i class="fa fa-angle-down text-white h-auto collp-close" style="display: none;"></i>
                            <i class="fa fa-angle-up text-white h-auto collp-open" style="display: none;"></i>
                        </div>
                    </a>
                    <div class="collapse {{ request()->is('UserReport*','UserChallenge*','UserMoodReport*','language*') ? 'show' : '' }}" id="User-collapse">

                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">

                            @role('admin')
                            <li class="dash-item dash-hasmenu {{ request()->is('UserReport*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('UserReport.course') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-video"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Courses') }}</span>
                                </a>
                            </li>
                            @endcan


                            @role('admin')
                            <li class="dash-item dash-hasmenu {{ request()->is('UserChallenge*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('UserChallenge.challenge') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-video"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Challenge') }}</span>
                                </a>
                            </li>
                            @endcan

                            @role('admin')
                            <li class="dash-item dash-hasmenu {{ request()->is('UserMoodReport*') ? 'active' : '' }} ps-4">
                                <a class="dash-link" href="{{ route('UserMoodReport.userMood') }}">
                                    <!-- <span class="dash-micon"><i class="ti ti-squares-filled"></i></span> -->
                                    <span class="dash-mtext custom-weight">{{ __('Moods Prefrence') }}</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                <!-- drop down menue end   -->

                @role('admin')
                <!-- <li class="dash-item dash-hasmenu {{ request()->is('settings*') ? 'active' : '' }}">
                    <a class="dash-link" href="{{ route('settings.index') }}">
                        <span class="dash-micon"><i class="ti ti-settings"></i></span>
                        <span class="dash-mtext custom-weight">{{ __('Settings') }}</span>
                    </a>
                </li> -->
                @endrole




                @include('layouts.menu')
            </ul>

        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
