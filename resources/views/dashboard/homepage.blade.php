@extends('layouts.admin')
@section('title')
    {{ __(' Welcome Back Admin!') }}
@endsection
@section('content')
<style>
    .canvasjs-chart-credit{
        display: none;
    }
    .page-header-title {
        margin-bottom: 5px;
    }
    .card-body{
        padding: 35px 35px !important;
    }

    .comp-card i {
    width: 60px;
    height: 60px;
    border-radius: 60%;
    text-align: center;
    padding: 17px 0;
    font-size: 30px;
}
.m-b-5 {
    margin-bottom: 12px;
}

.page-header h4, .page-header .h4 {
    margin-bottom: 20px;
    margin-right: 8px;
    padding-right: 8px;
    font-weight: 500;
}
</style>
    <!-- [ breadcrumb ] start -->

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <!-- analytic card start -->
        @can('manage-user')
        <div class="col-xl-4 col-md-12">
            <a href="users">
                <div class="card comp-card rounded-card-10px">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="m-b-5">Users</h3>
                                <h6 class="m-b-0 text-muted fs-cs-14px mb-1">Manage and Edit users</h6>
                            </div>
                            <div class="col-auto rounded-circle-dash">
                                <i class="ti ti-users bg-primary text-white d-block"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan
        @can('manage-role')
        <div class="col-xl-4 col-md-12">
            <a href="{{ route('Course-video.index') }}">
                <div class="card comp-card rounded-card-10px">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="m-b-5">Manage Video</h3>
                                <h6 class="m-b-0 text-muted fs-cs-14px mb-1">{{ __('Manage and Edit Videos') }}</h6>
                            </div>
                            <div class="col-auto rounded-circle-dash">
                                <i class="ti ti-video bg-info text-white d-block"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan
        @can('manage-module')
        <div class="col-xl-4 col-md-12">
            <a href="{{ route('Challenge.index') }}">
                <div class="card comp-card rounded-card-10px">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="m-b-5">Manage Documents</h3>
                                <h6 class="m-b-0 text-muted fs-cs-14px mb-1">{{ __('Manage and Edit Documents') }}</h6>
                            </div>
                            <div class="col-auto rounded-circle-dash">
                                <i class="ti ti-edit bg-success text-white d-block"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan
        @can('manage-langauge')
        <div class="col-xl-4 col-md-12">
            <a href="language">
                <div class="card comp-card rounded-card-10px">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="m-b-5">Manage Approval</h3>
                                <h6 class="m-b-0 text-muted fs-cs-14px mb-1">{{ __('Manage and Edit Approval') }}</h6>
                            </div>
                            <div class="col-auto rounded-circle-dash">
                                <i class="ti ti-check bg-danger text-white d-block"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a> 
        </div>
        <div class="col-xl-4 col-md-12">
            <a href="language">
                <div class="card comp-card rounded-card-10px">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="m-b-5">Manage Events</h3>
                                <h6 class="m-b-0 text-muted fs-cs-14px mb-1">{{ __('Manage and Edit Events') }}</h6>
                            </div>
                            <div class="col-auto rounded-circle-dash">
                                <i class="ti ti-calendar-event bg-warning text-white d-block"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-12">
            <a href="language">
                <div class="card comp-card rounded-card-10px">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="m-b-5">Manage Playbook</h3>
                                <h6 class="m-b-0 text-muted fs-cs-14px mb-1">{{ __('Manage and Edit Playbook') }}</h6>
                            </div>
                            <div class="col-auto rounded-circle-dash">
                                <i class="ti ti-player-pause bg-secondary text-white d-block"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan

        <!-- project-ticket end -->

        {{-- <div class="row"> --}}
        <!-- <div class="col-lg-12 ">
            @role('admin')
            <div class="card rounded-card-10px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">{{ 'Users' }}</h4>
                        </div>

                        <div class="col-sm-7 d-none d-md-block">

                            <div class="btn-group btn-group-toggle float-end mr-3" role="group" data-toggle="buttons">
                                <label class="btn btn-light-primary " for="option1" id="option1" >
                                    <input id="option1" type="radio" class="btn-ckeck" name="options" autocomplete="off" checked="">
                                    {{ __('Month') }}
                                </label>
                                <label class="btn btn-light-primary active" for="option2" id="option2">
                                    <input id="option2" type="radio" class="btn-ckeck" name="options" autocomplete="off"> {{ __('Year') }}
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="c-chart-wrapper chartbtn">
                        <canvas class="chart" id="main-chart" height="300"></canvas>
                    </div>
                </div>
            </div>
            @endrole
        </div> -->


        <!-- <div class="col-lg-12 ">
            @role('admin')
            <div class="card rounded-card-10px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">{{ 'Users' }}</h4>
                        </div>

                        <div class="col-sm-7 d-none d-md-block">

                            <div class="btn-group btn-group-toggle float-end mr-3" role="group" data-toggle="buttons">
                                <label class="btn btn-light-primary active" for="option1" id="option1" >
                                    <input id="option1" type="radio" class="btn-ckeck" name="options" autocomplete="off" checked="">
                                    {{ __('Month') }}
                                </label>
                                <label class="btn btn-light-primary" for="option2" id="option2">
                                    <input id="option2" type="radio" class="btn-ckeck" name="options" autocomplete="off"> {{ __('Year') }}
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="c-chart-wrapper chartbtn">
                        <canvas class="chart" id="main-chart" height="300"></canvas>
                    </div>
                </div>
            </div>
            @endrole
        </div> -->

        <!-- <div class="col-md-6">
            <div class="card rounded-card-10px">
                <div class="card-body">
                    <h4 class="card-title mb-0">Users</h4>
                    <canvas id="myChart" style="height: 230px;"></canvas>
                </div>
            </div>
        </div> -->
<!-- 
        <div class="col-md-6">
            <div class="card rounded-card-10px">
                <div class="card-body">
                    <h4 class="card-title mb-0">Purchase history</h4>
                    <div id="chartContainer" style="height: 230px; width: 100%;"></div>
                </div>
            </div>
        </div> -->

    </div>
    <!-- [ Main Content ] end -->
    </div>
    </div>

@endsection
@push('style')
    {{--  @include('layouts.includes.datatable_css')  --}}
    {{--  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">  --}}
@endpush


@section('javascript')
@role('admin')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script>
        $(document).on("click", "#option2", function() {
            getChartData('year');
        });

        $(document).on("click", "#option1", function() {
            getChartData('month');
        });
        $(document).ready(function() {
            getChartData('year');
        })

        function getChartData(type) {

            $.ajax({
                url: "{{ route('get.chart.data') }}",
                type: 'POST',
                data: {
                    type: type,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                success: function(result) {
                    mainChart.data.labels = result.lable;
                    mainChart.data.datasets[0].data = result.value;
                    mainChart.update()
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            });
        }
    </script>
    <script>
var ctx = document.getElementById('myChart').getContext('2d');

var data = {
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'Octomber', 'November', 'December'],
  datasets: [{
    label: 'Monthly Sales',
    data: [50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 650, 700, 800],
    backgroundColor: '#5146e0',
    borderColor: '#5146e0',
    borderWidth: 1,
    pointBackgroundColor: '#5146e0',
    pointRadius: 6,
    pointBorderWidth: 1,
    pointHoverBackgroundColor: '#5146e0',
    pointHoverBorderColor: '#5146e0',
  }]
};

var options = {
  scales: {
    y: {
      beginAtZero: true,
      grid: {
        color: 'rgba(0, 0, 0, 0.1)',
      },
    },
    x: {
      grid: {
        color: 'rgba(0, 0, 0, 0.1)',
      },
    },
  },
  plugins: {
    legend: {
      display: false,
    },
  },
};

var myChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options,
});
</script>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		dataPoints: [
			{y: 50.45, label: "Google"},
			{y: 10.31, label: "Bing"},
			{y: 7.06, label: "Baidu"},
			{y: 30.91, label: "Yahoo"},
			{y: 1.26, label: "Others"}
		]
	}]
});
chart.render();

}
</script>

@endrole
@endsection
