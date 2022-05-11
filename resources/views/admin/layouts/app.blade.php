<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="dc.language" content="{{ app()->getLocale() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blogger admin">
    <meta name="author" content="Ahmet Arşiv">
    <meta name="generator" content="ArsivPro">
    @yield('meta')

    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ui.css') }}">
    @yield('css')
</head>
<body style="scroll-behavior: smooth;">

<div class="navbar-top">
    <div class="navbar-top-left">
        <div class="nav-container">
            <div class="nav-toggle"></div>
            <div class="overlay"></div>
            <div class="nav-top">
                <div class="pro-info">
                    <div class="profile-info-icon">
                        <span>{{ auth()->user()->name[0] }}</span>
                    </div>
                    <div class="profile-info-desc">
                        <div class="name">
                            {{ auth()->user()->name }}
                        </div>

                        <div class="role">
                            Administrator
                        </div>
                    </div>
                    <div style="display: inline-block;">
                        <span class="close"></span>
                    </div>
                </div>
            </div>
            <div class="nav-items">
                <div class="nav-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-tab-name">
                        <span class="icon-menu icon dashboard-icon"
                              style="margin-right: 10px; display: inline-block; vertical-align: middle; transform: scale(0.8);"></span>
                        <span class="menu-label">Panel</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="brand-logo">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{asset('images/logo.png')}}">
            </a>
        </div>
    </div>

    <div class="navbar-top-right">
        <div class="profile">
            <span class="avatar"></span>
            <div class="store">
                <div>
                    <a href="#" target="_blank" style="display: inline-block; vertical-align: middle;">
                        <span class="icon store-icon" title="Visit Shop"></span>
                    </a>
                </div>
            </div>

            <div class="notifications">
                <div class="dropdown-toggle">
                    <i class="icon notification-icon active" style="margin-left: 0px;"></i>
                </div>
            </div>

            <div class="profile-info dropdown-open">
                <div class="dropdown-toggle">
                    <div style="display: inline-block; vertical-align: middle;">
                        <div class="profile-info-div">
                            <div class="profile-info-icon">
                                <span>{{ auth()->user()->name[0] }}</span>
                            </div>


                            <div class="profile-info-desc">
                                <span class="name">
                                    {{ auth()->user()->name }}
                                </span>

                                <span class="role">
                                    Administrator
                                </span>
                            </div>
                        </div>
                    </div>
                    <i class="icon arrow-down-icon active"></i>
                </div>

                <div class="dropdown-list bottom-right">
                    <span class="app-version">Version : {{ app()->version() }}</span>

                    <div class="dropdown-container">
                        <label>Account</label>
                        <ul>
                            <li>
                                <a href="{{ route('admin.profile.edit') }}">My Account</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.logout') }}">Logout</a>
                            </li>
                            <li style="display: flex;justify-content: space-between;">
                                <div style="margin-top:7px">Mode</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar-left ">
    <ul class="menubar">
        <li class="menu-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
            <a class="menubar-anchor" href="{{ route('admin.dashboard') }}">
                <span class="icon-menu icon dashboard-icon"></span>
                <span class="menu-label">Dashboard</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/blog*') ? 'active' : '' }}">
            <a class="menubar-anchor" href="{{ route('admin.blog.index') }}">
                <span class="icon-menu icon dashboard-icon"></span>
                <span class="menu-label">Blog</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/category*') ? 'active' : '' }}">
            <a class="menubar-anchor" href="{{ route('admin.category.index') }}">
                <span class="icon-menu icon dashboard-icon"></span>
                <span class="menu-label">Category</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/cms*') ? 'active' : '' }}">
            <a class="menubar-anchor" href="{{ route('admin.cms.index') }}">
                <span class="icon-menu icon dashboard-icon"></span>
                <span class="menu-label">CMS</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/slider*') ? 'active' : '' }}">
            <a class="menubar-anchor" href="{{ route('admin.slider.index') }}">
                <span class="icon-menu icon dashboard-icon"></span>
                <span class="menu-label">Slider</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/locale*') ? 'active' : '' }}">
            <a class="menubar-anchor" href="{{ route('admin.locale.index') }}">
                <span class="icon-menu icon dashboard-icon"></span>
                <span class="menu-label">Locale</span>
            </a>
        </li>

        {{--<li class="menu-item">
            <a class="menubar-anchor" href="#">
                <span class="icon-menu icon settings-icon"></span>
                <span class="menu-label">Settings</span>
                <span class="icon arrow-icon  arrow-icon-left"></span>
            </a>
            <ul class="sub-menubar">
                <li class="sub-menu-item ">
                    <a href="#">
                        <span class="menu-label">Locales</span>
                    </a>
                </li>
                <li class="sub-menu-item ">
                    <a href="#">
                        <span class="menu-label">Currencies</span>
                    </a>
                </li>
                <li class="sub-menu-item ">
                    <a href="#">
                        <span class="menu-label">Exchange Rates</span>
                    </a>
                </li>
                <li class="sub-menu-item ">
                    <a href="#">
                        <span class="menu-label">Inventory Sources</span>
                    </a>
                </li>
                <li class="sub-menu-item ">
                    <a href="#">
                        <span class="menu-label">Channels</span>
                    </a>
                </li>
                <li class="sub-menu-item ">
                    <a href="#">
                        <span class="menu-label">Users</span>
                    </a>
                </li>
                <li class="sub-menu-item ">
                    <a href="#">
                        <span class="menu-label">Sliders</span>
                    </a>
                </li>
                <li class="sub-menu-item ">
                    <a href="#">
                        <span class="menu-label">Taxes</span>
                    </a>
                </li>
                <li class="sub-menu-item ">
                    <a href="#">
                        <span class="menu-label">Velocity</span>
                    </a>
                </li>
            </ul>
        </li>--}}
    </ul>
    <div class="menubar-bottom" id="nav-expand-button">
        <i class="icon accordian-right-icon"></i>
    </div>
</div>

<div class="content-container ">
    <div class="inner-section">
        <div class="content-wrapper">
            <div class="tabs"></div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')
</html>
