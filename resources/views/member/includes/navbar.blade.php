 <!-- [ Header ] start -->
 <nav class="navbar header-navbar pcoded-header">
     <div class="navbar-wrapper">
         <div class="navbar-logo">
             <a href="{{ route('admin') }}">
                 <img class="img-fluid" src="{{ asset('public/admin/assets/images/logo.png') }}" style="width:3rem"
                     alt="Theme-Logo" />
             </a>
             <a class="mobile-menu" id="mobile-collapse" href="#!">
                 <i class="feather icon-menu icon-toggle-right"></i>
             </a>
             <a class="mobile-options waves-effect waves-light">
                 <i class="feather icon-more-horizontal"></i>
             </a>
         </div>
         <div class="navbar-container container-fluid">
             <ul class="nav-left">
                 <li class="header-search">
                     <div class="main-search morphsearch-search">
                         <div class="input-group">
                             <span class="input-group-text search-close">
                                 <i class="feather icon-x input-group-text"></i>
                             </span>
                             <input type="text" class="form-control" placeholder="Enter Keyword">
                             <span class="input-group-text search-btn">
                                 <i class="feather icon-search input-group-text"></i>
                             </span>
                         </div>
                     </div>
                 </li>
                 <li>
                     <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                         <i class="full-screen feather icon-maximize"></i>
                     </a>
                 </li>
             </ul>
             <ul class="nav-right">
                 <li class="header-notification">
                     <div class="dropdown-primary dropdown">
                         <a class="btn  waves-effect waves-light btn-light btn-square" target="_blank"
                             href="{{ route('home') }}">
                             Visit Home Page
                         </a>
                     </div>
                 </li>
                 <li class="header-notification">
                     <div class="dropdown-primary dropdown">
                         <div class="dropdown-toggle" data-bs-toggle="dropdown">
                             <i class="feather icon-bell"></i>
                             <span class="badge bg-c-red">5</span>
                         </div>
                         <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn"
                             data-dropdown-out="fadeOut">
                             <li>
                                 <h6>Notifications</h6>
                                 <label class="form-label label label-danger">New</label>
                             </li>
                             <li>
                                 <div class="d-flex">
                                     <div class="flex-shrink-0">
                                         <img class="img-radius"
                                             src="{{ asset('public/admin/assets/images/avatar-4.jpg') }}"
                                             alt="Generic placeholder image">
                                     </div>
                                     <div class="flex-grow-1">
                                         <h5 class="notification-user">John Doe</h5>
                                         <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                         <span class="notification-time">30 minutes ago</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex">
                                     <div class="flex-shrink-0">
                                         <img class="img-radius"
                                             src="{{ asset('public/admin/assets/images/avatar-3.jpg') }}"
                                             alt="Generic placeholder image">
                                     </div>
                                     <div class="flex-grow-1">
                                         <h5 class="notification-user">Joseph William</h5>
                                         <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                         <span class="notification-time">30 minutes ago</span>
                                     </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="d-flex">
                                     <div class="flex-shrink-0">
                                         <img class="img-radius"
                                             src="{{ asset('public/admin/assets/images/avatar-4.jpg') }}"
                                             alt="Generic placeholder image">
                                     </div>
                                     <div class="flex-grow-1">
                                         <h5 class="notification-user">Sara Soudein</h5>
                                         <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                         <span class="notification-time">30 minutes ago</span>
                                     </div>
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="user-profile header-notification">

                     <div class="dropdown-primary dropdown">
                         <div class="dropdown-toggle" data-bs-toggle="dropdown">
                            @if(auth()->user()->profile != null)
                            <img src="{{ asset( 'public'.Storage::url(auth()->user()->profile) ) }}" class="img-radius"
                            alt="User"> 
                            @endif 
                            <span>{{ Auth::user()->name }}</span>
                             <i class="feather icon-chevron-down"></i>
                         </div>
                         <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
                             data-dropdown-out="fadeOut">
                             <li>
                                 <a href="{{ route('member.profile') }}">
                                     <i class="feather icon-user"></i> Profile
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('logouts') }}">
                                     <i class="feather icon-log-out"></i> Logout
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
 <!-- [ chat user list ] start -->