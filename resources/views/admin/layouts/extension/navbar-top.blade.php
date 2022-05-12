<nav class="navbar-top navbar navbar-expand-lg navbar-light border-bottom d-none d-md-block">
    <div class="container-fluid">

        <a class="navbar-logo-link" href="{{ route('admin.dashboard') }}">
            <img class="sidebar-logo" src="{{asset('images/logo.webp')}}" alt="logo">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">

                <li class="nav-item me-2">
                    <a class="nav-link navbar-border" href="/">
                        <i class="bi bi-shop-window fs-4 ms-2"></i>
                    </a>
                </li>

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
