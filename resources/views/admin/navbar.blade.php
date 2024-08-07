    <!-- partial:partials/_sidebar.html -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a href="{{ url('users') }}" class="logo">
                <img src="admin/assets/images/klassy-logo.png" alt="Klassy Cafe HTML Template">
            </a>
            <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg"
                    alt="logo" /></a>
        </div>
        <ul class="nav">


            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('/users') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Users</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('/foodmenu') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-playlist-play"></i>
                    </span>
                    <span class="menu-title">Food Menu</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('/viewchef') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-table-large"></i>
                    </span>
                    <span class="menu-title">Chefs</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('/viewreservation') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-chart-bar"></i>
                    </span>
                    <span class="menu-title">Reservations</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('/orders') }}">
                    <span class="menu-icon">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">Food Orders</span>
                </a>
            </li>
        </ul>
    </nav>
