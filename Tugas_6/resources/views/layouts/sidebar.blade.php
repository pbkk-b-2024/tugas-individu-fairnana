<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    <!-- Logo dan bagian atas lainnya di sini -->

    <!-- Sidebar menu -->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="hover-scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">

                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">

                    <!-- Menu Dashboard -->
                    <div class="menu-item">
                        <a class="menu-link active" href="{{ route('home') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-category fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>

                    <!-- Menu khusus untuk Admin -->
                    @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">
                                Admin Menu
                            </span>
                        </div>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('admin.users') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-user fs-2"></i>
                            </span>
                            <span class="menu-title">Users Data</span>
                        </a>
                        <a class="menu-link" href="{{ route('admin.events.index') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-user fs-2"></i>
                            </span>
                            <span class="menu-title">Events Data</span>
                        </a>
                    </div>


                    @endif
                    @if(Auth::check() && Auth::user()->role === 'user')
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">
                                User Menu
                            </span>
                        </div>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('users.events.current') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-calendar fs-2"></i>
                            </span>
                            <span class="menu-title">Current Events</span>
                        </a>
                        <a class="menu-link" href="{{ route('comingsoon') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-calendar fs-2"></i>
                            </span>
                            <span class="menu-title">Upcoming Events</span>
                        </a>
                        <a class="menu-link" href="{{ route('users.events.my') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-calendar fs-2"></i>
                            </span>
                            <span class="menu-title">My Events</span>
                        </a>
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>