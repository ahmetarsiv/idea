<nav class="navbar fixed-bottom bottom-navigation-mb justify-content-around d-flex d-md-none d-lg-none d-xl-none d-xxl-none">
    <ul class="navbar-list mx-auto ">
        <li class="navbar-item">
            <a class="navbar-link" id="sidebarToggleM">
                <i class="bi bi-list navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('admin/blog*') ? 'active' : '' }}"
               href="{{ route('admin.blog.index') }}">
                <i class="bi bi-pencil-square navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
               href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid-fill navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('admin/cms*') ? 'active' : '' }}"
               href="{{ route('admin.cms.index') }}">
                <i class="bi bi-cast navbar-link-icon"></i>
            </a>
        </li>

        <li class="navbar-item">
            <a class="navbar-link {{ request()->is('admin/product*') ? 'active' : '' }}"
               href="{{ route('admin.product.index') }}">
                <i class="bi bi-bag navbar-link-icon"></i>
            </a>
        </li>

        <div class="navbar-underscore"></div>
    </ul>
</nav>
