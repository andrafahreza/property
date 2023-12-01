@php
    use App\Models\Message;
    $contacts = Message::latest()->limit(4)->get();
    $status = Message::where('read', false)->get();
@endphp

<div class="iq-sidebar sidebar-double-icon">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="header-logo mx-auto">
            ADMINISTRATOR
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div id="sidebar-scrollbar" class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('home') }}" class="@if ($page == 'dashboard') active @endif">
                            <i class="las la-home iq-arrow-left"></i><span>Dashboard</span>
                        </a>
                        <a href="{{ route('ability') }}" class="@if ($page == 'ability') active @endif">
                            <i class="las la-chalkboard-teacher iq-arrow-left"></i><span>Kemampuan</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('projects') }}" class="@if ($page == 'projects') active @endif">
                            <i class="las la-briefcase"></i><span>Project</span>
                        </a>
                        <a href="{{ route('testimoni') }}" class="@if ($page == 'testimoni') active @endif">
                            <i class="las la-certificate"></i><span>Testimoni</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('package') }}" class="@if ($page == 'package') active @endif">
                            <i class="las la-briefcase"></i><span>Paket</span>
                        </a>
                        <a href="{{ route('message') }}" class="@if ($page == 'message') active @endif">
                            <i class="las la-envelope"></i><span>Message</span>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="iq-top-navbar">
    <div class="iq-navbar-custom d-flex align-items-center justify-content-between">
        <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
            <i class="ri-menu-line wrapper-menu"></i>
        </div>
        <div class="iq-menu-horizontal"></div>
        <nav class="navbar navbar-expand-lg school-navbar navbar-light p-0">
            <div class="change-mode">
                <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                    <div class="custom-switch-inner">
                        <p class="mb-0"> </p>
                        <input type="checkbox" class="custom-control-input" id="dark-mode"
                            data-active="true">
                        <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                            <span class="switch-icon-left"><i class="a-left"></i></span>
                            <span class="switch-icon-right"><i class="a-right"></i></span>
                        </label>
                    </div>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list align-items-center">
                    <li class="nav-item nav-icon dropdown">
                        <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-notification-line"></i>
                            @if ($status->count() > 0)
                                <span class="bg-primary dots"></span>
                            @endif
                        </a>
                        <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="card shadow-none m-0">
                                <div class="card-body p-0 ">
                                    <div class="cust-title p-3">
                                        <h5 class="mb-0">All Notifications</h5>
                                    </div>
                                    <div class="p-3">
                                        @foreach ($contacts as $contact)
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded-small"
                                                            src="{{ asset('back/assets/images/login/mail.png') }}" alt="">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0">
                                                            {{ $contact->name }}

                                                            @if ($contact->status == false)
                                                                <small class="badge badge-success float-right">New</small>
                                                            @endif
                                                        </h6>
                                                        <p class="mb-0">{{ $contact->needed }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <a class="right-ic btn btn-primary btn-block position-relative p-2"
                                        href="{{ route('message') }}" role="button">
                                        <div class="dd-icon"><i class="las la-arrow-right mr-0"></i></div>
                                        View All
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item iq-full-screen"><a href="#" class="" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                    <li class="caption-content">
                        <a href="#" class="iq-user-toggle">
                            <img src="{{ asset(Auth::user()->photo == null ? "back/assets/images/user/07.jpg" : Auth::user()->photo) }}" class="img-fluid rounded" alt="user">
                        </a>
                        <div class="iq-user-dropdown">
                            <div class="card">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center mb-0">
                                    <div class="header-title">
                                        <h4 class="card-title mb-0">Profile</h4>
                                    </div>
                                    <div class="close-data text-right badge badge-primary cursor-pointer">
                                        <i class="ri-close-fill"></i>
                                    </div>
                                </div>
                                <div class="data-scrollbar" data-scroll="2">
                                    <div class="card-body">
                                        <div class="profile-header">
                                            <div class="cover-container text-center">
                                                <img src="{{ asset(Auth::user()->photo == null ? "back/assets/images/user/07.jpg" : Auth::user()->photo) }}" alt="profile-bg" class="rounded img-fluid avatar-80">
                                                <div class="profile-detail mt-3">
                                                    <h3>{{ Auth::user()->name }}</h3>
                                                    <p class="mb-1">Super Administrator</p>
                                                </div>
                                                <a href="{{ route('logout') }}" class="btn btn-primary">Sign Out</a>
                                            </div>
                                            <div class="profile-details my-4">
                                                <a href="{{ route('profile') }}" class="iq-sub-card bg-success-light rounded-small p-2">
                                                    <div class="media align-items-center">
                                                        <div class="rounded iq-card-icon-small">
                                                            <i class="ri-account-box-line"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">Account settings</h6>
                                                            <p class="mb-0 font-size-12">Manage your account
                                                                parameters.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="p-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
