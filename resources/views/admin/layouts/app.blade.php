<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="dc.language" content="{{ app()->getLocale() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blogger admin">
    <meta name="author" content="Ahmet Arşiv">
    <meta name="generator" content="ArsivPro">
    @yield('meta')

    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end d-flex d-sm-flex" id="sidebar-wrapper">
        <div class="sidebar-heading">
            <div class="list-group list-group-flush sidebar-menu">

                <a class="sidebar-logo-link d-md-none d-lg-none d-xl-none d-xxl-none" href="{{ route('admin.dashboard') }}">
                    <img class="sidebar-logo" src="{{asset('images/logo.png')}}" alt="logo">
                </a>

                <a class="sidebar-menu-list">
                    <a class="list-group-item list-group-item-action d-md-none d-lg-none d-xl-none d-xxl-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-info-icon-sidebar me-1"><span>{{ auth()->user()->name[0] }}</span></div>
                        <span class="sidebar-menu-text fs-6">{{auth()->user()->name .' '. auth()->user()->surname}}</span>
                        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
                    </a>
                    <ul class="dropdown-menu sidebar-dropdown-open d-md-none d-lg-none d-xl-none d-xxl-none" aria-labelledby="dropdownMenuButton1">
                        <span class="text-secondary ms-2">Version : v{{ app()->version() }}</span><br>
                        <span class="text-secondary ms-2 fw-bold">HESAP</span>
                        <li><a class="dropdown-item" href="{{route('admin.profile.edit')}}">Hesabım</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.logout')}}">Çıkış Yap</a></li>
                    </ul>

                    <a class="list-group-item list-group-item-action {{ request()->is('admin/dashboard*') ? 'active' : '' }}"
                       href="{{route('admin.dashboard')}}">
                        <i class="bi bi-grid-fill fs-4"></i>
                        <span class="sidebar-menu-text">Panel</span>
                    </a>

                    <a class="list-group-item list-group-item-action {{ request()->is('admin/blog*', 'admin/category*') ? 'active' : '' }}" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-pencil-square fs-4"></i>
                        <span class="sidebar-menu-text">Blog</span>
                        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
                    </a>
                    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton3">
                        <span class="text-secondary ms-2 fw-bold">POST</span>
                        <li><a class="dropdown-item" href="{{route('admin.blog.index')}}">Blog</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.category.index')}}">Kategoriler</a></li>
                    </ul>

                    <a class="list-group-item list-group-item-action {{ request()->is('admin/cms*') ? 'active' : '' }}"
                       href="{{route('admin.cms.index')}}">
                        <i class="bi bi-cast fs-4"></i>
                        <span class="sidebar-menu-text">CMS</span>
                    </a>

                    <a class="list-group-item list-group-item-action {{ request()->is('admin/locale*', 'admin/slider*', 'admin/configuration*') ? 'active' : '' }}" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear fs-4"></i>
                        <span class="sidebar-menu-text">Ayarlar</span>
                        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
                    </a>
                    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton3">
                        <span class="text-secondary ms-2 fw-bold">SISTEM</span>
                        <li><a class="dropdown-item" href="{{route('admin.locale.index')}}">Dil Seçenekleri</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.slider.index')}}">Slider</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.configuration.index')}}">Yapılandırma</a></li>
                    </ul>
                </a>

            </div>
        </div>
    </div>
    <div class="sidebar-toggle-button">
        <a class="btn btn-light" id="sidebarToggle"><i class="bi bi-list fs-4"></i></a>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar-top navbar navbar-expand-lg navbar-light border-bottom d-none d-md-block">
            <div class="container-fluid">

                <a class="navbar-logo-link" href="{{ route('admin.dashboard') }}">
                    <img class="sidebar-logo" src="{{asset('images/logo.png')}}" alt="logo">
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item me-2">
                            <a class="nav-link navbar-border">
                                <i class="bi bi-bell fs-4 ms-2"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar-border" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="profile-info-icon-nav"><span>{{ auth()->user()->name[0] }}</span></div>
                                <span class="name">
                                    {{auth()->user()->name .' '. auth()->user()->surname}}
                                    <p class="role">{{auth()->user()->role_id == 1 ? 'Administrator' : 'Guest'}}</p>
                                    <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-open" aria-labelledby="navbarDropdown">
                                <span class="text-secondary ms-2">Version : v{{ app()->version() }}</span><br>
                                <span class="text-secondary ms-2 fw-bold">HESAP</span>
                                <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Hesabım</a>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}">Çıkış Yap</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content-app">
            @yield('content')
        </div>

        <nav class="navbar fixed-bottom bottom-navigation-mb justify-content-around d-flex d-md-none d-lg-none d-xl-none d-xxl-none">
            <ul class="navbar-list mx-auto ">
                <li class="navbar-item">
                    <a class="navbar-link" id="sidebarToggleM" >
                        <i class="bi bi-list navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('admin/blog*') ? 'active' : '' }}" href="{{ route('admin.blog.index') }}">
                        <i class="bi bi-pencil-square navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-grid-fill navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('admin/cms*') ? 'active' : '' }}" href="{{ route('admin.cms.index') }}">
                        <i class="bi bi-cast navbar-link-icon"></i>
                    </a>
                </li>

                <li class="navbar-item">
                    <a class="navbar-link {{ request()->is('admin/profile*') ? 'active' : '' }}" href="{{ route('admin.profile.edit') }}">
                        <span class="navbar-link-icon fw-bold">{{ auth()->user()->name[0] }}</span>
                    </a>
                </li>

                <div class="navbar-underscore"></div>
            </ul>
        </nav>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')
</html>
