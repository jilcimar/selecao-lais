@extends('layouts.base')
@section('head-extra')
    <!-- Morris Chart Css-->
    <link href="{{ asset('plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>TELA DE INDICADORES</h2>
    </div>

    <!-- Widgets -->
        @include('includes.widgets')
    <!-- #END# Widgets -->

    <div class="row clearfix">
        <!-- Pie Chart -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>TIPO DE VÍCUNLO EMPREGATÍCIO DOS PROFISSIONAIS</h2>
                </div>
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>

            </div>
        </div>
        <!-- #END# Pie Chart -->
        <!-- Bar Chart -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>VINCULAÇÃO DOS PROFISSIONAIS</h2>
                </div>
                <div class="body">
                    <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>
        <!-- #END# Bar Chart -->
    </div>




</div>
@endsection

@section('footer-extra')

    <script>
        window.onload = function() {
            var dados_profissionais = {!! json_encode($tipos_profissionais) !!};
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {},
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00\"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints:dados_profissionais
                }]
            });
            chart.render();

            var vinculo_profissionais = {!! json_encode($vinculos_profissionais) !!};

            var chart = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title: {},
                axisY: {
                    title: "Nº de Profissionais"
                },
                data: [{
                    type: "column",
                    showInLegend: false,
                    legendMarkerColor: "grey",
                    dataPoints:vinculo_profissionais
                }]
            });
            chart.render();
        }
    </script>



    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script src="{{ asset('js/pages/index.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('plugins/morrisjs/morris.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('plugins/jquery-countto/jquery.countTo.js') }}"></script>

@endsection
