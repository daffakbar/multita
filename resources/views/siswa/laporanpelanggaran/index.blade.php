@extends('siswa.layout.auth')

@section('content')
<div class="container">
    <div class="content-viewport">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 class="mb-4">Laporan pelanggaran siswa</h1></div>

               
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-5">
              <div class="grid">
                <p class="grid-header">Data siswa</p>
                <div class="grid-body">
                  <div class="item-wrapper">
                    <div class="table-responsive">
                      <table class="table info-table table-bordered">
                        <thead>
                          <tr>
                            <th>NIS</th>
                            <th>3272799</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Nama</td>
                            <td>M. Budi Pamungkas</td>
                          </tr>
                          <tr>
                            <td>Kelas</td>
                            <td>XII IPA 4</td>
                          </tr>
                          <tr>
                            <td>Jenis kelamin</td>
                            <td>L</td>
                          </tr>
                          <tr>
                            <td>Nama orang tua</td>
                            <td>Hendra</td>
                          </tr>
                          <tr>
                            <td>Agama</td>
                            <td>Islam</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="grid">
                <p class="grid-header">Data pelanggaran siswa</p>
                <div class="item-wrapper">
                  <div class="table-responsive">
                    <table class="table info-table table-striped">
                      <thead>
                        <tr>
                          <th>Tanggal</th>
                          <th>Jenis pelanggaran</th>
                          <th>Kategori</th>
                          <th>Poin</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>01/01/2020</td>
                          <td>Tidak memakai topi upacara</td>
                          <td>Kerapian</td>
                          <td>10</td>
                        </tr>
                        <tr>
                          <td>02/01/2020</td>
                          <td>Terlambat</td>
                          <td>Kerajinan</td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>08/01/2020</td>
                          <td>Terlambat</td>
                          <td>Kerajinan</td>
                          <td>5</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="grid">
                <div class="grid-body">
                  <h2 class="grid-title">Jumlah pelanggaran perbulan</h2>
                  <div class="item-wrapper">
                    <canvas id="chartjs-bar-chart" width="600" height="400"></canvas>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection