<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="/dashboard" class="{{ Request::is('dashboard') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard SI ALUR KATA
                    </a>
                </li>
                <li class="app-sidebar__heading">Menu</li>
                <li class="{{ Request::is('dashboard/documentapbds*', 'dashboard/documentpapbs*', 'dashboard/documentpjs*') ? 'mm-active' : '' }}">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-copy-file"></i>
                        Dokumen Kelengkapan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="/dashboard/documentapbds" class="{{ Request::is('dashboard/documentapbds*') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                APBD
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/documentpapbs" class="{{ Request::is('dashboard/documentpapbs*') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                PAPBD
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/documentpjs" class="{{ Request::is('dashboard/documentpjs*') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Pertanggung Jawab
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('dashboard/keputusanapbds*', 'dashboard/keputusanpapbs*', 'dashboard/keputusanpjs*') ? 'mm-active' : '' }}">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-news-paper"></i>
                        Keputusan Gubernur
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="/dashboard/keputusanapbds" class="{{ Request::is('dashboard/keputusanapbds*') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                APBD
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/keputusanpapbs" class="{{ Request::is('dashboard/keputusanpapbs*') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                PAPBD
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/keputusanpjs" class="{{ Request::is('dashboard/keputusanpjs*') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Pertanggung Jawab
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/dashboard/results" class="{{ Request::is('dashboard/results*') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-mail-open-file"></i>
                        Hasil Tindak Lanjut
                    </a>
                </li>
                <li>
                    <a href="/dashboard/reports" class="{{ Request::is('dashboard/reports*') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Laporan Realisasi
                    </a>
                </li>
                @if (auth()->user()->roles == 'Admin')
                <li class="app-sidebar__heading">Admin</li>
                <li>
                    <a href="/dashboard/users" class="{{ Request::is('dashboard/users*') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-id"></i>
                        Users
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>