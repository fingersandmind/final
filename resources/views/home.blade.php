@extends ('layout')

@section ('head')

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">


@endsection

@section('content')


    @include('layouts.sidebar')

    
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Teacher Attendance Chart-->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col lg-15">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div>
                                    <h5 class="card-title m-b-0">Teacher Performance</h5>
                                </div>
                                <div class="ml-auto">
                                    <ul class="list-inline text-center font-12">
                                        <li><i class="fa fa-circle text-danger"></i>Absent</li>
                                        <li><i class="fa fa-circle text-primary"></i>Absent</li>
                                        <li><i class="fa fa-circle text-success"></i>Present</li>
                                    </ul>
                                </div>
                            </div>

                            <canvas id="subjectChart" width="50%" height="20"></canvas>
                            <div class="container">
                               <div class="col-md-12">
                                   <div class="col-md-4">
                                        <select id="dropdown" class="form-control" width="50%">
                                            <option value="0">Select Month</option>
                                        </select>
                                   </div>
                               </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push ('additionalJS')

    @if (session('status'))
        <script>
        swal("Welcome","{{session('status') }}",'success')
        </script>
    @endif

    <script src="{{asset('vendor/Chart.min.js')}}"></script>
    {{-- <script src="{{asset('vendor/subjectsChart.js')}}"></script> --}}
    {{-- Dropdown change event --}}

    

    <script>
    ( function ( $ ) {

charts = {
    init: function () {
        // -- Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

         this.ajaxGetAttendanceMonthlyData();
        // this.createCompletedJobsChart();

    },

    ajaxGetAttendanceMonthlyData: function () { 

        var id = 0 //if ! empty get first value from the dropdown else 0;
        var urlPath =  'http://localhost/capstonefinal/public/datas/'+id;
        var request = $.ajax( {
            method: 'GET',
            url: urlPath
        } );

        request.done( function ( response ) {

            charts.createCompletedJobsChart( response );
        });
    },


    /**
     * Created the Completed Jobs Chart
     */
    createCompletedJobsChart: function ( response ) { 

        var ctx = document.getElementById("subjectChart");
        var subjects = response.subjects
        var lates = {
            label: 'Lates',
            data: response.lates, //data of each subj represents late
            backgroundColor: 'rgb(255, 69, 0)',
            borderWidth: 0, 
        }
        var absents = {
            label: 'Absent',
            data: response.absents,
            backgroundColor: 'rgb(255, 0, 0)',
            borderWidth: 0,
        }
        var presents = {
            label: 'Present',
            data: response.presents,
            backgroundColor: 'rgba(24, 130, 236, 1)',
            borderWidth: 0,
        }

        var weekData = {
            labels: subjects, //week days
            datasets: [presents, lates, absents] //must be an object of subjects with late, absent or present as its data
        };

        var chartOptions = {
            scales: {
              xAxes: [{
                barPercentage: 1,
                categoryPercentage: 0.6
              }],
              yAxes: [{
                ticks: {
                    beginAtZero:true,
                    max: response.max,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
              }]
            }
        };

        var barChart = new Chart(ctx, {
            type: 'bar',
            data: weekData,
            options: chartOptions
        });
    }
};

charts.init();

} )( jQuery );
    </script>

    <script>
        $(document).ready(function() {

            $(document).on('change', '#dropdown', function(event) {
                event.preventDefault();
                var id = $(this).val();
                var urlPath =  'http://localhost/capstonefinal/public/datas/' + id;
                var request = $.ajax( {
                    method: 'GET',
                    url: urlPath
                });

                request.done( function ( response ) {
                    charts.createCompletedJobsChart( response );
                });
            });
        });
    </script>


    {{-- Dropdown list of datas month --}}

    <script>
        $(document).ready(function(){
            var $selectdropdown = $("#dropdown");
            $.getJSON('{{route('months')}}', function (result){
                $.each(result, function(index, val){
                    $.each(val,function (j,k){
                        $selectdropdown.append($("<option />").val(j).text(k));
                    });
                });
            });
        });
    </script>
    
@endpush