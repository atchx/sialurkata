<div class="app-header header-shadow">
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
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn-shadow p-1 btn btn-primary btn-sm">
                    Logout
                    <i class="fa text-white pe-7s-right-arrow pr-1 pl-1"></i>
                </button>
            </form>
        </span>
    </div>    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>    
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{ auth()->user()->name }}
                            </div>
                            <div class="widget-subheading">
                                {{ auth()->user()->roles }}
                            </div>
                        </div>
                        <div class="widget-content-right header-user-info ml-3">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn-shadow p-1 btn btn-primary btn-sm">
                                    Logout
                                    <i class="fa text-white pe-7s-right-arrow pr-1 pl-1"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        </div>
    </div>
</div>