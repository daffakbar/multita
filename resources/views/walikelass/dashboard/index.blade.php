@extends('walikelass.layout.auth')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-3 col-sm-6 col-6 equel-grid">
          <div class="grid">
              <div class="grid-body text-gray">
                  <div class="d-flex justify-content-between">
                      <p class="text-black">Jumlah siswa</p>
                      {{-- <p>+06.2%</p> --}}
                  </div>
                  <p>{{$jumlahsiswa}}</p>
                  <div class="wrapper w-50 mt-4">
                      <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                          class="chartjs-size-monitor">
                          <div class="chartjs-size-monitor-expand"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                          </div>
                          <div class="chartjs-size-monitor-shrink"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                          </div>
                      </div>
                      <canvas height="17" id="stat-line_1" style="display: block; width: 118px; height: 17px;"
                          width="118" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6 equel-grid">
          <div class="grid">
              <div class="grid-body text-gray">
                  <div class="d-flex justify-content-between">
                      <p class="text-black">Total Pelanggaran</p>
                      {{-- <p>+15.7%</p> --}}
                  </div>
                  <p>{{$totpel}}</p>
                  <div class="wrapper w-50 mt-4">
                      <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                          class="chartjs-size-monitor">
                          <div class="chartjs-size-monitor-expand"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                          </div>
                          <div class="chartjs-size-monitor-shrink"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                          </div>
                      </div>
                      <canvas height="17" id="stat-line_2" style="display: block; width: 118px; height: 17px;"
                          width="118" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6 equel-grid">
          <div class="grid">
              <div class="grid-body text-gray">
                  <div class="d-flex justify-content-between">
                      <p class="text-black">Total Prestasi</p>
                      {{-- <p>+02.7%</p> --}}
                  </div>
                  <p>{{$totpres}}</p>
                  <div class="wrapper w-50 mt-4">
                      <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                          class="chartjs-size-monitor">
                          <div class="chartjs-size-monitor-expand"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                          </div>
                          <div class="chartjs-size-monitor-shrink"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                          </div>
                      </div>
                      <canvas height="17" id="stat-line_3" style="display: block; width: 118px; height: 17px;"
                          width="118" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6 equel-grid">
          <div class="grid">
              <div class="grid-body text-gray">
                  <div class="d-flex justify-content-between">
                      {{-- @foreach ($sering as $ps)
          <p>{{$ps->jenisPelanggaran}}</p>
                      <p>{{$ps->jumlah}}</p>
                      --}}
                      {{-- <p>{!!json_encode($pelser)!!}</p> --}}
                      <p class="text-black">Jumlah Wali murid </p>
                      {{-- @endforeach --}}
                  </div>
                  {{-- @foreach ($pelsering as $p) --}}
                  <p>{{$pelserin}} </p>
                  {{-- @endforeach --}}
                  <div class="wrapper w-50 mt-4">
                      <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                          class="chartjs-size-monitor">
                          <div class="chartjs-size-monitor-expand"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                          </div>
                          <div class="chartjs-size-monitor-shrink"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                          </div>
                      </div>
                      <canvas height="17" id="stat-line_4" style="display: block; width: 118px; height: 17px;"
                          width="118" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-12 equel-grid">
          {{-- <div class="grid"> --}}
              {{-- <hr> --}}
              <p class="text-black">Top 4 pelanggaran siswa </p>
              <hr>
      {{-- </div> --}}
      
  </div>
  @foreach ($pelsiswa as $ps)            
  <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
          <div class="grid-body text-gray">
              <div class="d-flex justify-content-between">
                  <p>Poin</p>
                  <p class="badge badge-danger">{{$ps->total}}</p>
              </div>
              <hr>
              <p class="text-black">{{$ps->name}}</p>
              
          </div>
      </div>
  </div>
  @endforeach
          
      
        <div class="col-md-6">
          <div class="grid">
              <div class="grid-body">
                  <h2 class="grid-title">Jumlah Pelanggaran dan Prestasi perkelas</h2>
                  <div class="item-wrapper">
                      <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                          class="chartjs-size-monitor">
                          <div class="chartjs-size-monitor-expand"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                          </div>
                          <div class="chartjs-size-monitor-shrink"
                              style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                              <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                          </div>
                      </div>
                      <canvas id="chartjs-staked-bar-chart" width="540" height="360"
                          style="display: block; width: 540px; height: 360px;"
                          class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>
      
      <div class="col-md-6">
          <div class="grid table-responsive">
            <table class="table table-stretched">
              <thead>
                <tr>
                  <th>Top 5 pelanggaran terbanyak</th>
                  {{-- <th>Price</th> --}}
                  <th>jumlah</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($pelsering as $p)
                  <tr>
                    <td>
                      <p class="mb-n1">{{$p->jenisPelanggaran}}</p>
                      {{-- <small class="text-gray">Apple Inc.</small> --}}
                    </td>
                    {{-- <td class="font-weight-medium">198.18</td> --}}
                    <td class="text-danger font-weight-medium">
                      <div class="badge badge-danger">{{$p->jumlah}}</div>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>

  </div>
</div>
@endsection
@section('footer')
{{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
{{-- <script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
</script> --}}
<script>
  $(function () {
  'use strict';
  if ($("#chartjs-staked-bar-chart").length) {
    var BarData = {
      labels: {!!json_encode($arraykelas)!!},
      datasets: [{
        label: 'Pelanggaran',
          data: {!!json_encode($arraypel)!!},
          backgroundColor: chartColors[1],
          borderColor: chartColors[1],
          borderWidth: 0
        },
        {
          
          label: 'Prestasi',
          data: {!!json_encode($arraypres)!!},
          backgroundColor: chartColors[2],
          borderColor: chartColors[2],
          borderWidth: 0
        }
      ]
    };
    var barChartCanvas = $("#chartjs-staked-bar-chart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: BarData,
      options: {
        tooltips: {
          mode: 'index',
          intersect: false
        },
        responsive: true,
        scales: {
          xAxes: [{
            stacked: true,
          }],
          yAxes: [{
            stacked: true
          }]
        },
        legend: false
      }
    });
  }
});
</script>
@endsection