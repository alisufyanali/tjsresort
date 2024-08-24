<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Request::routeIs('admin') ? 'active' : '' }}">
                    <a href="{{ route('admin') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('admin.location.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.location.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-location-arrow"></i>
                        </span>
                        <span class="pcoded-mtext">Location</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('admin.contact.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-comments-o"></i>
                        </span>
                        <span class="pcoded-mtext">Contacts List</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('admin.review.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.review.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-star-half-empty"></i>
                        </span>
                        <span class="pcoded-mtext">Review List</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('admin.reservation.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.reservation.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-bookmark"></i>
                        </span>
                        <span class="pcoded-mtext">Reservation List</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('admin.member.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.member.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-users"></i>
                        </span>
                        <span class="pcoded-mtext">Member List</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('admin.employee.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.employee.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-user-secret"></i>
                        </span>
                        <span class="pcoded-mtext">Employee List</span>
                    </a>
                </li>


                <li class="{{ Request::routeIs('admin.coupons.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.coupons.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-codepen"></i>
                        </span>
                        <span class="pcoded-mtext">Coupon List</span>
                    </a>
                </li>
                
                <li class="{{ Request::routeIs('admin.time-off.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.time-off.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-clock-o"></i>
                        </span>
                        <span class="pcoded-mtext">Time Off Request List</span>
                    </a>
                </li>
                
                <li class="{{ Request::routeIs('admin.blogs.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.blogs.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-clock-o"></i>
                        </span>
                        <span class="pcoded-mtext">Blog</span>
                    </a>
                </li>
                <li class="pcoded-hasmenu  " dropdown-icon="style1" subitem-icon="style1">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Events</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('admin.event.list') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Events List</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <div class="pcoded-navigation-label" menu-title-theme="theme1">App</div>
                <li class="{{ Request::routeIs('admin.to-do.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.to-do.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-bookmark"></i>
                        </span>
                        <span class="pcoded-mtext">To Do</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.email.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.email.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <span class="pcoded-mtext">Email</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('admin.event-calendar.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.event-calendar.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <span class="pcoded-mtext">Event Calendar</span>
                    </a>
                </li>
                <div class="pcoded-navigation-label" menu-title-theme="theme1">Setting</div>

                <li class="{{ Request::routeIs('admin.homepage_content.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.homepage_content.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <span class="pcoded-mtext">Homepage Content</span>
                    </a>
                </li>

                
                <li class="{{ Request::routeIs('admin.homepage_testimonial.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.homepage_testimonial.list') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-user"></i>
                        </span>
                        <span class="pcoded-mtext">Homepage Testimonial</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('admin.email_settings.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.email_settings.list') }}" class="waves-effect waves-dark">
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