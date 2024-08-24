@extends('admin.layouts.app')


@section('content')

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- [ page content ] start -->
                <div class="col-md-12">
                    <div class="card table-card">
                        <div class="card-body">
                            <h4>Reservations</h4>
                            <div id="reservation"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card table-card">
                        <div class="card-body">
                            <h4>Members</h4>
                            <div id="member_graph"></div>
                        </div>
                    </div>
                </div>
                <!-- [ page content ] end -->
            </div>
        </div>
    </div>
</div>

@endsection



@section('script')

<!-- Float Chart js -->
<script src="{{ asset('public/admin/assets/pages/chart/float/jquery.flot.js') }}"></script>
<script src="{{ asset('public/admin/assets/pages/chart/float/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('public/admin/assets/pages/chart/float/curvedLines.js') }}"></script>
<script src="{{ asset('public/admin/assets/pages/chart/float/jquery.flot.tooltip.min.js') }}"></script>
<!-- Chartlist charts -->
<script src="{{ asset('public/admin/bower_components/chartist/js/chartist.js') }}"></script>
<!-- amchart js -->
<script src="{{ asset('public/admin/assets/pages/widget/amchart/amcharts.js') }}"></script>
<script src="{{ asset('public/admin/assets/pages/widget/amchart/serial.js') }}"></script>
<script src="{{ asset('public/admin/assets/pages/widget/amchart/light.js') }}"></script>

<script type="text/javascript" src="{{ asset('public/admin/assets/pages/dashboard/custom-dashboard.min.js') }}">
</script>



<script>
$.ajax({
    url: "{{ route('member.graph') }}",
    method: 'GET',
    dataType: 'json',
    success: function(response) {
        const chartData = response;
        const xValues = chartData.map(data => data.x);
        const yValues = chartData.map(data => data.y);
        const options = {
            chart: {
                type: 'area',
                height: 350,
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            series: [{
                name: 'project',
                data: yValues,
                color: "#90e0ef"
            }],

            legend: {
                horizontalAlign: 'left'
            },
            xaxis: {
                categories: xValues,
            },
        };
        const chart = new ApexCharts(document.querySelector('#member_graph'), options);
        chart.render();
    },
    error: function(error) {
        console.error(error);
    }
});

// category graph
$.ajax({
    url: "{{ route('reservation.graph') }}",
    method: 'GET',
    dataType: 'json',
    success: function(response) {
        const chartData = response;
        const xValues = chartData.map(data => data.x);
        const yValues = chartData.map(data => data.y);
        const options = {
            chart: {
                type: 'bar',
                height: 350,
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            series: [{
                name: 'category',
                data: yValues,
                color: "#1b263b"
            }],

            legend: {
                horizontalAlign: 'left'
            },
            xaxis: {
                categories: xValues,
            },
        };
        const chart = new ApexCharts(document.querySelector('#reservation'), options);
        chart.render();
    },
    error: function(error) {
        console.error(error);
    }
});
</script>

@endsection