@extends('walimurid.layout.auth')

@section('content')
<div class="container">                                                                                                                                                                                                                                                                                               
  <div class="row">
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
        <div class="grid-body text-gray">
          <div class="d-flex justify-content-between">
            <p class="text-black">Total Pelanggaran</p>
            {{-- <p>+06.2%</p> --}}
          </div>
          <p>{{$totpel}}</p>
          <div class="wrapper w-50 mt-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas height="17" id="stat-line_1" style="display: block; width: 118px; height: 17px;" width="118" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
        <div class="grid-body text-gray">
          <div class="d-flex justify-content-between">
            <p class="text-black">Total Prestasi</p>
            {{-- <p>+15.7%</p> --}}
          </div>
          <p>{{$totpres}}</p>
          <div class="wrapper w-50 mt-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas height="17" id="stat-line_2" style="display: block; width: 118px; height: 17px;" width="118" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
        <div class="grid-body text-gray">
          <div class="d-flex justify-content-between">
            <p class="text-black">Pelanggaran Terbanyak</p>
            {{-- <p>+02.7%</p> --}}
          </div>
          <p>{{$pelserin}}</p>
          <div class="wrapper w-50 mt-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas height="17" id="stat-line_3" style="display: block; width: 118px; height: 17px;" width="118" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
        <div class="grid-body text-gray">
          <div class="d-flex justify-content-between">
            <p class="text-black">Prestasi Terbanyak </p>
          </div>
          <p>{{$presserin}} </p>
          <div class="wrapper w-50 mt-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas height="17" id="stat-line_4" style="display: block; width: 118px; height: 17px;" width="118" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="col-md-6">
      <div class="grid">
        <div class="grid-body">
          <h2 class="grid-title">Jumlah Pelanggaran dan Prestasi perkelas</h2>
          <div class="item-wrapper"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chartjs-staked-bar-chart" width="540" height="360" style="display: block; width: 540px; height: 360px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="col-md-6">
      <div class="grid">
        <div class="grid-body">
          <h2 class="grid-title">Total Pelanggaran dan Prestasi</h2>
          <div class="item-wrapper"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chartjs-pie-chart" width="540" height="360" style="display: block; width: 540px; height: 360px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="col-md-8 equel-grid">
      <div class="grid">
        <div class="grid-body py-3">
          <p class="card-title ml-n1">Penerbitan Surat Peringatan</p>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-sm">
            <thead>
              <tr class="solid-header">
                <th>No.</th>
                <th>Nama</th>
                <th>Poin</th>
                <th>Sanksi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
               $no = 1;   
              @endphp
              @foreach ($suratperingatan as $sp)
              <tr>
                <td>{{$no++}}</td>
                <td>
                  <small class="text-black font-weight-medium d-block">{{$sp->name}}</small>
                  <span class="text-gray">
                    <span class="status-indicator rounded-indicator small bg-danger"></span>{{$sp->kelas}}</span>
                  </td>
                  <td>
                    <small>{{$sp->total}}</small>
                  </td>
                  <td> {{$sp->sanksi}} </td>
                  <td> 
                    <a href="https://wa.me/{{$sp->noHp}}?text=Anak anda bernama {{$sp->name}} mempunyai poin pelanggaran {{$sp->total}} dan mendapatkan sanksi berupa {{$sp->sanksi}}. Dari SMA Trimurti Surabaya 
                      
                      Terima kasih " class="btn btn-rounded social-icon-btn btn-behance" target="_blank">
                      <i class="mdi mdi-comment-processing-outline"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div> --}}
   
  </div>
</div>
@endsection
@section('footer')
{{-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script>
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
  if ($("#chartjs-pie-chart").length) {
    var PieData = {
      datasets: [{
        data: [{!!$totpres!!}, {{$totpel}}],
        backgroundColor: chartColors,
        borderColor: chartColors,
        borderWidth: chartColors
      }],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: [
        'Prestasi',
        'Pelanggaran',
        
      ]
    };
    var PieOptions = {
      responsive: true,
      animation: {
        animateScale: true,
        animateRotate: true
      }
    };
    var pieChartCanvas = $("#chartjs-pie-chart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: PieData,
      options: PieOptions
    });
  }
});
</script>
@endsection 