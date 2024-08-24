<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.includes.head')

    @yield('style')

</head>

<body>

    <!-- [ Pre-loader ] start -->
    <!-- <div class="loader-bg">
        <div class="loader-bar"></div>
    </div> -->
    <!-- [ Pre-loader ] end -->

    <!-- Page Wrapper -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('employee.includes.navbar')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('employee.includes.sidebar')

                    <!-- Begin Page Content -->
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-home bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>{{ isset($data['title']) ? $data['title'] : '' }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('admin') }}"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a
                                                    href="#!">{{ isset($data['title']) ? $data['title'] : '' }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                    <!-- [ style Customizer ] start -->
                    <div id="styleSelector">
                    </div>
                    <!-- [ style Customizer ] end -->
                </div>
            </div>
        </div>
    </div>



    @include('admin.includes.foot')

    @yield('script')

</body>

</html>