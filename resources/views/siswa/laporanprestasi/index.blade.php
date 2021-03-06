@extends('siswa.layout.auth')

@section('content')
<div class="container">
    <div class="content-viewport">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="mb-4">Laporan Prestasi Siswa</h3></div>
               {{-- <input type="hidden" name="id" value="{{Auth::user()->id}}"> --}}
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
                        @foreach ($datasiswa as $s)
                            
                        <thead>
                          <tr>
                            <th>NIS</th>
                            <th>{{$s->id}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Nama</td>
                            <td>{{$s->name}}</td>
                          </tr>
                          <tr>
                            <td>Kelas</td>
                            <td>{{$s->kelas}}</td>
                          </tr>
                          <tr>
                            <td>Jenis kelamin</td>
                            <td>{{$s->jenisKelamin}}</td>
                          </tr>
                          <tr>
                            <td>Nama orang tua</td>
                            <td>{{$s->namewm}}</td>
                          </tr>
                          <tr>
                            <td>Agama</td>
                            <td>{{$s->agama}}</td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="grid">
                <p class="grid-header">Data prestasi siswa</p>
                <div class="item-wrapper">
                  <div class="table-responsive">
                    <table class="table info-table table-striped">
                      <thead>
                        <tr>
                          <th>Tanggal</th>
                          <th style="text-align:left">Kategori</th>
                          <th style="text-align:left">Bentuk Prestasi</th>
                          <th style="text-align:right">Poin</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($datapressiswa as $pel)
                        <tr>
                          <td>{{$pel->tanggalPrestasi}}</td>
                          <td style="text-align:left">{{$pel->kategoriprestasi}}</td>
                          <td style="text-align:left">{{$pel->jenisPrestasi}}</td>
                          <td style="text-align:right">{{$pel->poin}}</td>
                        </tr>
                        @endforeach
                        
                        <tr>
                        <td></td>  
                        <td></td>  
                        <td> <b>Total Prestasi</b> </td>  
                        <td><b>{{$totpres}}</b></td>  
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    {{ $datapressiswa->links() }}
                    Halaman : {{ $datapressiswa->currentPage() }} <br/>
                    Jumlah Data : {{ $datapressiswa->total() }} <br/>
                    Data Per Halaman : {{ $datapressiswa->perPage() }} <br/>
                  </div>
                </div>
              </div>
              {{-- <div class="grid">
                <div class="grid-body">
                  <h2 class="grid-title">Jumlah pelanggaran perbulan</h2>
                  <div class="item-wrapper">
                    <canvas id="chartjs-bar-chart" width="600" height="400"></canvas>
                  </div>
                </div>
              </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection