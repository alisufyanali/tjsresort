<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Request::routeIs('employee') ? 'active' : '' }}">
                    <a href="{{ route('employee') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('employee.time-off.list') ? 'active' : '' }}">
                    <a href="{{ route('employee.time-off.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-clock-o"></i>
                        </span>
                        <span class="pcoded-mtext">Take Off Requests</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('employee.working-hours') ? 'active' : '' }}">
                    <a href="{{ route('employee.working-hours') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-clock-o"></i>
                        </span>
                        <span class="pcoded-mtext">Working Hours</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('employee.reservation.list') ? 'active' : '' }}">
                    <a href="{{ route('employee.reservation.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-bookmark"></i>
                        </span>
                        <span class="pcoded-mtext">Reservation List</span>
                    </a>
                </li>

                <div class="pcoded-navigation-label" menu-title-theme="theme1">App</div>
                <li class="{{ Request::routeIs('employee.email.list') ? 'active' : '' }}">
                    <a href="{{ route('employee.email.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <span class="pcoded-mtext">Email</span>
                    </a>
                </li>
                
                
                <li class="{{ Request::routeIs('employee.blogs.list') ? 'active' : '' }}">
                    <a href="{{ route('employee.blogs.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="pcoded-mtext">Comming Soon</span>
                    </a>
                </li>

                
                <li class="{{ Request::routeIs('employee.events.list') ? 'active' : '' }}">
                    <a href="{{ route('employee.events.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="pcoded-mtext">Events</span>
                    </a>
                </li>
                
                <div class="pcoded-navigation-label" menu-title-theme="theme1">Setting</div>

                <li class="{{ Request::routeIs('employee.email_settings.list') ? 'active' : '' }}">
                    <a href="{{ route('employee.email_settings.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-user"></i>
                        </span>
                        <span class="pcoded-mtext">Email Setting</span>
                    </a>
                </li>

                
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->