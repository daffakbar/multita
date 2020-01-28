@extends('timketertiban.layout.auth')

@section('content')
<div class="container">
   
    <div class="content-viewport">

        <div class="row">
          <div class="col-lg-4 equel-grid">
            <div class="grid">
              <p class="grid-header">Prestasi siswa</p>
              <div class="grid-body">
                <div class="item-wrapper">
                  <form action="{{ url('timketertiban/pressiswa/tambah') }}" method="post">
                    {{ csrf_field() }}
                    {{-- <input type="text" class="form-control" id="inputType8" readonly="readonly" name="idPrestasi"> --}}
                    <div class="form-group">
                        <label for="inputPassword1">Nama siswa</label>
                        <select class="js-example-basic-single form-control" name="idKelassiswapres">
                            @foreach ($siswas as $s)
                            <option value="{{ $s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword1">Jenis prestasi</label>
                      <select class="js-example-basic-single form-control" name="idJenispresP">
                        {{-- @foreach ($kategoripres as $kp)
                        <option value="{{$kp->idJenispres}}">{{$kp->jenisPrestasi}} / </option>
                        @endforeach       --}}
                        
                        @foreach ($kategoripres as $kp)
                        <option value="{{$kp->idJenispres}}">{{$kp->jenisPrestasi}} / {{$kp->poin}} </option>
                        @endforeach
                        
                    </select>
                    </div>
                   <div class="form-group">
                      <label for="">Poin</label>
                      <input type="text" class="form-control poin" id="poin" readonly="readonly" value="">
                      
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal</label>
                      <input type="date" class="form-control" name="tanggalPrestasi">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
            <div class="col-lg-8">
                <div class="grid">
                    <p class="grid-header">Master data prestasi</p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align:left">Nama siswa</th>
                                        <th style="text-align:left">Kategori </th>
                                        <th style="text-align:left">Jenis </th>
                                        <th style="text-align:left">Poin</th>
                                        <th style="text-align:left">Tanggal</th>
                                        <th style="text-align:left">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @php $no = 1 @endphp
                                  @foreach ($prestasi as $p)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td style="text-align:left">{{$p->name}}</td>
                                        <td style="text-align:left">{{$p->kategoriprestasi}}</td>
                                        <td style="text-align:left">{{$p->jenisPrestasi}}</td>
                                        <td style="text-align:left">{{$p->poin}}</td>
                                        <td style="text-align:left">{{$p->tanggalPrestasi}}</td>
                                        <td class="actions">
                                        {{-- <a href="/timketertiban/mastersanksi/edit/" class="btn btn-rounded social-icon-btn btn-google"><i
                                                class="mdi mdi-square-edit-outline"></i></a> --}}
                                        <a href="/timketertiban/pressiswa/hapus/{{$p->idPrestasi}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$p->jenisPrestasi}} ?')"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
