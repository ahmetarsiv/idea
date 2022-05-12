<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="dc.language" content="{{ app()->getLocale() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="ArsivPro">
    @yield('meta')

    <link rel="icon" sizes="16x16" href="{{asset('images/favicon.webp')}}" type="image/x-icon"/>
    @yield('css')
</head>
<body>

<div class="d-flex" id="wrapper">

    <div class="border-end d-flex d-sm-flex" id="sidebar-wrapper">
        <div class="sidebar-heading">
            <div class="list-group list-group-flush sidebar-menu">

                <a class="sidebar-logo-link d-md-none d-lg-none d-xl-none d-xxl-none"
                   href="{{ route('admin.dashboard') }}">
                    <img class="sidebar-logo" src="{{asset('images/logo.webp')}}" alt="logo">
                </a>

                @include('admin.layouts.extension.sidebar')

            </div>
        </div>
    </div>

    <div class="sidebar-toggle-button">
        <a class="btn btn-light" id="sidebarToggle"><i class="bi bi-list fs-4"></i></a>
    </div>

    <div id="page-content-wrapper">

        @include('admin.layouts.extension.navbar-top')

        <div class="content-app">
            @yield('content')
        </div>

        @include('admin.layouts.extension.navbar')
    </div>
</div>

</body>
@extends('admin.layouts.script')
@yield('js')
</html>
