<a class="sidebar-menu-list">
    <a class="list-group-item list-group-item-action d-md-none d-lg-none d-xl-none d-xxl-none" type="button"
       id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="profile-info-icon-sidebar me-1"><span>{{ auth()->user()->name[0] }}</span></div>
        <span class="sidebar-menu-text fs-6">{{auth()->user()->name .' '. auth()->user()->surname}}</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open d-md-none d-lg-none d-xl-none d-xxl-none"
        aria-labelledby="dropdownMenuButton1">
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

    <a class="list-group-item list-group-item-action {{ request()->is('admin/blog*', 'admin/category*') ? 'active' : '' }}"
       type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-pencil-square fs-4"></i>
        <span class="sidebar-menu-text">Blog</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton3">
        <span class="text-secondary ms-2 fw-bold">POST</span>
        <li><a class="dropdown-item" href="{{route('admin.blog.index')}}">Blog</a></li>
        <li><a class="dropdown-item" href="{{route('admin.category.index')}}">Kategoriler</a></li>
    </ul>

    <a class="list-group-item list-group-item-action {{ request()->is('admin/product*') ? 'active' : '' }}"
       href="{{route('admin.product.index')}}">
        <i class="bi bi-bag fs-4"></i>
        <span class="sidebar-menu-text">Ürünler</span>
    </a>

    <a class="list-group-item list-group-item-action {{ request()->is('admin/cms*') ? 'active' : '' }}"
       href="{{route('admin.cms.index')}}">
        <i class="bi bi-cast fs-4"></i>
        <span class="sidebar-menu-text">CMS</span>
    </a>

    <a class="list-group-item list-group-item-action {{ request()->is('admin/locale*', 'admin/slider*', 'admin/meta-data*','admin/meta-content*','admin/user*') ? 'active' : '' }}"
       type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-gear fs-4"></i>
        <span class="sidebar-menu-text">Ayarlar</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton3">
        <span class="text-secondary ms-2 fw-bold">SISTEM</span>
        <li><a class="dropdown-item" href="{{route('admin.locale.index')}}">Dil Seçenekleri</a></li>
        <li><a class="dropdown-item" href="{{route('admin.slider.index')}}">Slider</a></li>
        <li><a class="dropdown-item" href="{{route('admin.meta-data.edit')}}">Idea</a></li>
        <li><a class="dropdown-item" href="{{route('admin.meta-content.index')}}">Meta İçerikleri</a></li>
        <li><a class="dropdown-item {{Auth::user()->role_id == 1 ? ' ' : 'd-none'}}"
               href="{{route('admin.user.index')}}">Kullanıcılar</a></li>
    </ul>

    <a class="list-group-item list-group-item-action {{ request()->is('admin/configuration*') ? 'active' : '' }} {{Auth::user()->role_id == 1 ? ' ' : 'd-none'}}"
       href="{{route('admin.configuration.edit')}}">
        <i class="bi bi-sliders fs-4"></i>
        <span class="sidebar-menu-text">Yapılandırma</span>
    </a>
</a>
