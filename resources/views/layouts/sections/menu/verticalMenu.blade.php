<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                @include('_partials.macros', ['width' => 25, 'withbg' => '#696cff'])
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">{{ config('variables.templateName') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="javascript:void(0)'" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('profile') ? 'active' : '' }}">
            <a href="{{ route('profile.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>Profile</div>
            </a>
        </li>
        {{-- <li class="menu-item ">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx bx-dock-top"></i>
                <div>Account Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons bx bx bx-dock-top"></i>
                        <div>Account</div>
                    </a>
                </li>
                active open -> untuk menu yg active
                <li class="menu-item ">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons bx bx bx-dock-top"></i>
                        <div>Notifications</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons bx bx bx-dock-top"></i>
                        <div>Connections</div>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>

</aside>
