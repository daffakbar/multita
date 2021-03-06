@extends('bk.layout.auth')

@section('content')
<div class="container">
{{-- 
  <select class="js-example-basic-single" name="state">
    <option value="AL">Alabama</option>
      ...
    <option value="WY">Wyoming</option>
  </select> --}}
    <div class="content-viewport">
      <div class="row">
        <div class="col-lg-4 equel-grid">
          <div class="grid">
            <p class="grid-header">Form kelas siswa</p>
            <div class="grid-body">
              <div class="item-wrapper">
                <form action="{{ url('bk/masterkelassiswa/tambah') }}" method="POST">
                  {{ csrf_field() }}
                <div class="form-group">
                  <label for="inputEmail1">Tahunajaran</label>
                  <select name="idTahunajarank" class="custom-select form-control js-example-basic-single"  required>
                    <option value="" selected>Pilih</option>
                    @foreach ($tahunajaran as $ta)
                    <option value="{{$ta->idTahunajaran}}">{{$ta->semester}} / {{$ta->tahun}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail1">Kelas</label>
                  <select name="idKelask" class="custom-select  js-example-basic-single" required>
                    <option value="" selected>Pilih</option>
                    @foreach ($kelas as $ks)
                    <option value="{{$ks->idKelas}}">{{$ks->kelas}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail1">Wali kelas</label>
                  <select name="idWalikelas" class="custom-select  js-example-basic-single" required>
                    <option value="" selected>Pilih</option>
                    @foreach ($walikelas as $w)
                    <option value="{{$w->id}}">{{$w->namewk}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail1">Siswa</label>
                  <select name="idSiswak" class="custom-select form-control  js-example-basic-single" id="" required>
                    <option value="" selected>Pilih</option>
                    @foreach ($siswas as $s)

                    {{-- @if ($s->idSiswak == null) --}}
                      <option value="{{$s->id}}">{{$s->name}}</option>
                        
                    {{-- @endif --}}
                    @endforeach  
                  </select>
                </div>
                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-8">
            <div class="grid">
              <p class="grid-header">Kelas siswa</p>
              <div class="item-wrapper">
                  <div class="table-responsive">
                      <table class="table info-table">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Tahun ajaran</th>
                                  <th>Kelas</th>
                                  <th>Wali siswa</th>
                                  <th>Nama siswa</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php $no = 1 @endphp
                              @foreach ($kelassiswa as $k)
                              <tr>
                                  <td>{{$no++}}</td>
                                  <td>{{$k->semester}}/{{$k->tahun}}</td>
                                  <td>{{$k->kelas}}</td>
                                  <td>{{$k->namewk}}</td>
                                  <td>{{$k->name}}</td>
                                  <td class="actions">
                                  {{-- <a href="/bk/masterkelassiswa/edit/{{$k->idKelassiswa}}" class="btn btn-rounded social-icon-btn btn-google"><i
                                          class="mdi mdi-square-edit-outline"></i></a> --}}
                                  <a href="/bk/masterkelassiswa/hapus/{{$k->idKelassiswa}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$k->name}} ?')"><i class="mdi mdi-delete"></i></a>
                                  </td>
                                  <td>
                                  </td>
                              </tr>    
                              @endforeach
                          </tbody>
                      </table>
                      {{ $kelassiswa->links() }}
                            Halaman : {{ $kelassiswa->currentPage() }} <br/>
                            Jumlah Data : {{ $kelassiswa->total() }} <br/>
                            Data Per Halaman : {{ $kelassiswa->perPage() }} <br/>
                      </div>
                  </div>
              </div>
          </div>
      </div>
       
    </div>
</div>
@endsection
