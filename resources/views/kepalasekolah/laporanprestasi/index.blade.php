@extends('kepalasekolah.layout.auth')

@section('content')

  <div class="page-content-wrapper-inner">
    <div class="content-viewport">
      <div class="row">
        <div class="col-lg-12">
          <div class="grid">
            <p class="grid-header"></p>
            <div class="grid-body">
              <div class="item-wrapper">
                <form action="{{ url('kepalasekolah/laporanprestasi/cetak') }}" method="GET">
                  {{ csrf_field() }}
                <div class="row mb-3">
                  <div class="col-md-8 mx-auto">
                    <div class="form-group row showcase_row_area">
                      <div class="col-md-3 showcase_text_area">
                        <label for="inputType1">Pilih kelas</label>
                      </div>
                      <div class="col-md-9 showcase_content_area">
                        <select class="js-example-basic-single form-control" name="idKelas">
                          @foreach ($kelas as $k)
                          <option value="{{$k->idKelas}}">{{$k->kelas}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row showcase_row_area">
                      <div class="col-md-3 showcase_text_area">
                        {{-- <label for="inputType1">Name</label> --}}
                      </div>
                      <div class="col-md-9 showcase_content_area">
                        {{-- <button type="submit" class="btn btn-sm btn-primary">Pilih</button> --}}
                        
                        <button type="submit" class="btn btn-sm btn-primary"><a class="mdi mdi-file-pdf link-icon"> Cetak</a> </button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-viewport">
      <div class="row">
          <div class="col-lg-12">
              <div class="grid">
                  <p class="grid-header">Laporan pelanggaran perkelas</p>
                  <div class="item-wrapper">
                      <div class="table-responsive">
                          <table class="table info-table">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th style="text-align:left">Nama</th>
                                      <th style="text-align:left">Kelas</th>
                                      {{-- <th style="text-align:left">Kategori prestasi</th> --}}
                                      <th style="text-align:left">Bentuk prestasi</th>
                                      <th style="text-align:left">Poin</th>
                                      <th style="text-align:left">Tanggal</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @php $no = 1 @endphp
                                  @foreach ($pilihkelas as $pk)
                                  <tr>
                                      <td>{{$no++}}</td>
                                      <td style="text-align:left">{{$pk->name}}</td>
                                      <td style="text-align:left">{{$pk->kelas}}</td>
                                      {{-- <td style="text-align:left">{{$pk->kategoriprestasi}}</td> --}}
                                      <td style="text-align:left">{{$pk->jenisPrestasi}}</td>
                                      <td style="text-align:left">{{$pk->poin}}</td>
                                      <td style="text-align:left">{{$pk->tanggalPrestasi}}</td>
                                  </tr>    
                                  @endforeach
                              </tbody>
                          </table>
                          <br>
                            {{ $pilihkelas->links() }}
                            Halaman : {{ $pilihkelas->currentPage() }} <br/>
                            Jumlah Data : {{ $pilihkelas->total() }} <br/>
                            Data Per Halaman : {{ $pilihkelas->perPage() }} <br/>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>


@endsection