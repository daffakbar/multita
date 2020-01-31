@extends('timketertiban.layout.auth')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
        <div class="grid-body text-gray">
          <div class="d-flex justify-content-between">
            <p>{{$jumlahsiswa}}</p>
            {{-- <p>+06.2%</p> --}}
          </div>
          <p class="text-black">Jumlah siswa</p>
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
            <p>{{$totpel}}</p>
            {{-- <p>+15.7%</p> --}}
          </div>
          <p class="text-black">Total Pelanggaran</p>
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
            <p>{{$totpres}}</p>
            {{-- <p>+02.7%</p> --}}
          </div>
          <p class="text-black">Total Prestasi</p>
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
            <p>{{$sispel}}</p>
            {{-- <p>- 53.34%</p> --}}
          </div>
          <p class="text-black">Jumlah siswa melanggar </p>
          <div class="wrapper w-50 mt-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas height="17" id="stat-line_4" style="display: block; width: 118px; height: 17px;" width="118" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="grid">
        <div class="grid-body">
          <h2 class="grid-title">Jumlah Pelanggaran dan Prestasi perkelas</h2>
          <div class="item-wrapper"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chartjs-staked-bar-chart" width="540" height="360" style="display: block; width: 540px; height: 360px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </div>
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
    <div class="col-md-8 equel-grid">
      <div class="grid">
        <div class="grid-body py-3">
          <p class="card-title ml-n1">Penerbitan Surat Peringatan</p>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-sm">
            <thead>
              <tr class="solid-header">
                <th colspan="2" class="pl-4">Nama</th>
                <th>Poin</th>
                <th>Sanksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pr-0 pl-4">
                  <img class="profile-img img-sm" src="../assets/images/profile/male/image_4.png" alt="profile image">
                </td>
                <td class="pl-md-0">
                  <small class="text-black font-weight-medium d-block">Barbara Curtis</small>
                  <span class="text-gray">
                    <span class="status-indicator rounded-indicator small bg-primary"></span>Account Deactivated </span>
                </td>
                <td>
                  <small>8523537435</small>
                </td>
                <td> Just Now </td>
              </tr>
              <tr>
                <td class="pr-0 pl-4">
                  <img class="profile-img img-sm" src="../assets/images/profile/male/image_3.png" alt="profile image">
                </td>
                <td class="pl-md-0">
                  <small class="text-black font-weight-medium d-block">Charlie Hawkins</small>
                  <span class="text-gray">
                    <span class="status-indicator rounded-indicator small bg-success"></span>Email Verified </span>
                </td>
                <td>
                  <small>9537537436</small>
                </td>
                <td> Mar 04, 2018 11:37am </td>
              </tr>
              <tr>
                <td class="pr-0 pl-4">
                  <img class="profile-img img-sm" src="../assets/images/profile/female/image_2.png" alt="profile image">
                </td>
                <td class="pl-md-0">
                  <small class="text-black font-weight-medium d-block">Nina Bates</small>
                  <span class="text-gray">
                    <span class="status-indicator rounded-indicator small bg-warning"></span>Payment On Hold </span>
                </td>
                <td>
                  <small>7533567437</small>
                </td>
                <td> Mar 13, 2018 9:41am </td>
              </tr>
              <tr>
                <td class="pr-0 pl-4">
                  <img class="profile-img img-sm" src="../assets/images/profile/male/image_10.png" alt="profile image">
                </td>
                <td class="pl-md-0">
                  <small class="text-black font-weight-medium d-block">Hester Richards</small>
                  <span class="text-gray">
                    <span class="status-indicator rounded-indicator small bg-success"></span>Email Verified </span>
                </td>
                <td>
                  <small>5673467743</small>
                </td>
                <td> Feb 21, 2018 8:34am </td>
              </tr>
            </tbody>
          </table>
        </div>
        <a class="border-top px-3 py-2 d-block text-gray" href="#">
          <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View All Order History</small>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
