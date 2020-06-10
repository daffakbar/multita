@extends('siswa.layout.auth')

@section('content')
<div class="container">                                                                                                                                                                                                                                                                                               
  <div class="row">
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
        <div class="grid-body text-gray">
          <div class="d-flex justify-content-between">
            <p class="text-black">Total Pelanggaran</p>
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
    <div class="col-md-5" >
      <div class="grid">
        <div class="grid-body">
          <h2 class="grid-title">Total Pelanggaran dan Prestasi</h2>
          <div class="item-wrapper" ><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <canvas id="chartjs-pie-chart" width="540" height="360" style="display: block; width: 540px; height: 360px;" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-5">
    {{-- <div class="grid"> --}}
        
      <div class="grid table-responsive">
        <div class="grid-body">
          <h2 class="grid-title">Pelanggaran dan Prestasi Terakhir</h2>
          <table class="table table-stretched">
            <thead>
              <tr>
                <th>Bentuk</th>
                {{-- <th>Price</th> --}}
                <th>Poin</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($historyp as $h)
              <tr>
                <td>
                  <p class="mb-n1 font-weight-medium">Pelanggaran</p>
                  <small class="text-gray">{{$h->jenisPelanggaran}}</small>
                </td>
                {{-- <td class="font-weight-medium">198.18</td> --}}
                <td class="text-danger font-weight-medium">
                  <div class="badge badge-danger">{{$h->poin}}</div>
                </td>
              </tr>
              @endforeach
              
              @foreach ($historypp as $hh) 
              <tr>
                <td>
                  <p class="mb-n1 font-weight-medium">Prestasi</p>
                  <small class="text-gray">{{$hh->jenisPrestasi}}</small>
                </td>
                {{-- <td class="font-weight-medium">08.42</td> --}}
                <td class="text-danger font-weight-medium">
                  <div class="badge badge-success">{{$hh->poin}}</div>
                </td>
              </tr>
            </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>   
  </div>
  <div class="col-md-2">
    <div class="grid">
        <div class="grid-body">
          {{-- <button class="btn btn-dark">Peringatan I</button> --}}
          <h2 class="grid-title">Status</h2>
            @if ($stats == 1)
            <button class=" btn-success" >Tidak ada sanksi</button>
            @elseif ($stats == 6)
            <button class=" btn-warning">Peringatan I</button>
            @elseif ($stats == 7)
            <button class=" btn-warning">Peringatan II</button>
            @elseif ($stats == 8)
            <button class=" btn-danger">Surat Peringatan I</button>
            @elseif ($stats == 9)
            <button class=" btn-danger">Surat Peringatan II</button>
            @elseif ($stats == 10)
            <button class=" btn-danger">Surat Peringatan III</button>
            @elseif ($stats == 11)
            <button class=" btn-dark">Skorsing</button>
            @else
            <button class=" btn-dark">Dikembalikan ke orang tua 	</button>
            @endif
        </div>
        </div>
    </div>

  
  </div>
   
  </div>  
</div>
@endsection
@section('footer')

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