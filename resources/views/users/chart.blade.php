@extends('users.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Teacher</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
        </div>
    </div>
</div>
<hr>

<div class="row">

    <canvas id="userchart"></canvas>
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
@endsection

@push ('additionalJS')

<script src="{{asset('vendor/Chart.min.js')}}"></script>

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

            var id = 1 //if ! empty get first value from the dropdown else 0;
            var month = 10
            var urlPath =  'http://localhost/capstonefinal/public/charts/'+id+'/'+month;
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

            var ctx = document.getElementById("userchart");
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
                    var month = $(this).val();
                    var urlPath =  '{{route('chart')}}' + id;
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