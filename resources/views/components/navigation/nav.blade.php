@section('navigation')
{{-- <div class="header-outer">
    <div class="header">
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars"
                aria-hidden="true"></i></a>
        <a id="toggle_btn" class="float-left" href="javascript:void(0);">
            <img src="{{ asset('assets/img/sidebar/icon-21.png') }}" alt="">
        </a>

        <ul class="nav float-left">
            <li>
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="search.html">
                        <input class="form-control" type="text" placeholder="Search here">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            <li>
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="search.html">

                        <input class="form-control driver-id" type="hidden" name="driver-id"
                            value="{{ auth()->user()->id }}">
                    </form>
                </div>
            </li>
            </li>
            <li>
                <a href="index.html" class="mobile-logo d-md-block d-lg-none d-block"><img
                        src="{{ asset('assets/img/logo1.png') }}" alt="" width="30"
                        height="30"></a>
            </li>
        </ul>


        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown d-none d-sm-block">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <img src="{{ asset('assets/img/sidebar/icon-22.png') }}" alt="">
                    <span
                        class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger"
                        id="notif-counts">
                        9
                    </span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span>Notifications</span>
                    </div>
                    <div class="drop-scroll">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media">
                                        <span class="avatar">
                                            <img alt="John Doe" src="{{ asset('assets/img/user-06.jpg') }}"
                                                class="img-fluid rounded-circle">
                                        </span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">John Doe</span> is
                                                now following you </p>
                                            <p class="noti-time"><span class="notification-time">4 mins
                                                    ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media">
                                        <span class="avatar">T</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Tarah
                                                    Shropshire</span> sent you a message.</p>
                                            <p class="noti-time"><span class="notification-time">6 mins
                                                    ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="activities.html">View all Notifications</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-sm-block">
                <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img
                        src="{{ asset('assets/img/sidebar/icon-23.png') }}" alt=""> </a>
            </li>
            <li class="nav-item dropdown has-arrow">
                <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle driver-profile"
                            src="assets/img/user-06.jpg" width="30" alt="Admin">
                        <span class="status online"></span></span>
                    <span>{{ auth()->user()->firstname }}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Logout</button>
                        </form>
                    </a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
                <a href="{{ route('driver.home') }}" class="logo">
                    <img src="{{ asset('assets/img/logo1.png') }}" width="40" height="40"
                        alt="">
                    <span class="text-uppercase">Van Rental</span>
                </a>
            </div>
            <ul class="sidebar-ul">
                <li class="menu-title">Menu</li>
                <li class="active">
                    <a href="{{ route('driver.home') }}">
                        <img src="{{ asset('assets/img/sidebar/icon-1.png') }}" alt="icon"><span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('assets/img/sidebar/icon-2.png') }}"
                            alt="icon"> <span>
                            booked</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('allBooked.home') }}"><span>All Booked</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ route('allClient.home') }}"><img src="{{ asset('assets/img/sidebar/icon-3.png') }}"
                            alt="icon"> <span>
                            Clients</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('allClient.home') }}"><span>All Clients</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div> --}}

{{-- updated version bootstrap 5.3 --}}
<nav class="sidebar close">
    <header class="d-flex align-items-center mb-2">
        <div class="image-text">
            <a href="{{ route('driver.home') }}" class="image">
                <img src="{{ asset('assets/img/logo1.png') }}" alt="">
            </a>
            <div class="text logo-text">
                <span class="name">VAN RENTAL</span>
                <span class="profession">Services Online</span>
            </div>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            {{-- <li class="search-box d-flex align-items-center mb-3">
                <i class='bx bx-search icon secondary-color'></i>
                <input type="text" class="form-control" placeholder="Search...">
            </li> --}}

            <ul class="menu-links list-unstyled mb-3">
                <li class="auto-active nav-link" data-id="/driver-dashboard">
                    <a href="{{ route('driver.home') }}" class="auto-active d-flex align-items-center">
                        <i class='icon'><img src="{{ asset('assets/img/sidebar/icon-1.png') }}" alt="icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link" data-id="/all-booked">
                    <a href="{{ route('allBooked.home') }}" class="d-flex align-items-center">
                        <i class='icon'><img src="{{ asset('assets/img/sidebar/icon-2.png') }}" alt="icon"></i>
                        <span class="text nav-text">Booked</span>
                    </a>
                </li>

                <li class="nav-link" data-id="/all-client">
                    <a href="{{ route('allClient.home') }}" class="d-flex align-items-center">
                        <i class='icon'><img src="{{ asset('assets/img/sidebar/icon-3.png') }}" alt="icon"></i>
                        <span class="text nav-text">Client</span>
                    </a>
                </li>

                <!-- Add more menu links as needed -->

            </ul>

            <div class="bottom-content">
                <li class="auto-logout d-flex align-items-center mb-3">
                    <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                    class="auto-logout">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- <button class="btn btn-danger" type="submit">Logout</button> --}}
                    </form>
                </li>

                {{-- <li class="mode d-flex align-items-center">
                    <div class="sun-moon me-2">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch ms-auto">
                        <span class="switch"></span>
                    </div>
                </li> --}}
                
            </div>
        </div>
    </div>
</nav>

@endsection