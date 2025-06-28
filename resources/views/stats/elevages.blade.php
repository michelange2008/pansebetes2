@extends('layouts.app')


@extends('menus.menuprincipal')

@section('contenu')
    <div class="container-fluid">

        <div class="mt-3 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                @include('fragments.flash')

            </div>

        </div>

        <div class="mt-3 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                @titre()

            </div>

        </div>

        <div class="my-3 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                {{-- <img class="img-200" src="{{ url('storage/img/work_in_progress.svg') }}" alt="En travaux"> --}}
                <div id="container"></div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var nb_saisies_salertes = <?php echo json_encode($nb_saisies_salertes)?>;
    Highcharts.chart('container', {
        chart : {
            type : 'column'
        },
        title: {
            text: 'Nombre d\'alertes par Panse-Bête'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [0,1,2,3,4,5,6,7,8,9,10],
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Nombre d\'alertes'
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            column: {
                pointPadding: 0,
                borderWidth: 0
            },
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'VL',
            data: [0,0,1,4,5,2,1,1,0,0]
        },
        {
            name: 'VA',
            data: [0,1,3,8,2,0,0,01,0,0]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
@endsection
