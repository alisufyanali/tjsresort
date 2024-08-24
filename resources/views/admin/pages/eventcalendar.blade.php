@extends('admin.layouts.app')

@section('style')
<!-- Calender css -->
<link rel="stylesheet" type="text/css"
    href="{{ asset('public/admin/bower_components/fullcalendar/css/fullcalendar.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('public/admin/bower_components/fullcalendar/css/fullcalendar.print.css') }}" media='print'>

@endsection




@section('content')


<div class="pcoded-inner-content full-calender">
    <div class="main-body">
        <div class="page-wrapper">

            <div class="page-body">
                <div class="card">
                    <div class="card-header">
                        <h5>Full Calendar</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-xl-2 col-md-12">
                                <div id="external-events">
                                    <h6 class="m-b-30 m-t-20">Events</h6>
                                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>
                                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 2</div>
                                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 3</div>
                                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 4</div>
                                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 5</div>
                                    <div class="checkbox-fade fade-in-primary m-t-10">
                                        <label class="form-label">
                                            <input type="checkbox" value="">
                                            <span class="cr">
                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            <span>Remove After Drop</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10 col-md-12">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-error">
        <div class="card text-center">
            <div class="card-block">
                <div class="m-t-10">
                    <i class="icofont icofont-warning text-white bg-c-yellow"></i>
                    <h4 class="f-w-600 m-t-25">Not supported</h4>
                    <p class="text-muted m-b-0">Full Calendar not supported in this device</p>
                </div>
            </div>
        </div>
    </div>
</div>



@csrf
@endsection



@section('script')


<!-- calender js -->
<script type="text/javascript" src="{{ asset('public/admin/bower_components/moment/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/admin/bower_components/fullcalendar/js/fullcalendar.min.js') }}">
</script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('public/admin/assets/pages/full-calender/calendar.js') }}"></script>


@endsection