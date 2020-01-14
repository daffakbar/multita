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
            <p class="grid-header">Pelanggaran siswa</p>
            <div class="grid-body">
              <div class="item-wrapper">
                <form action="{{ url('bk/masterkelassiswa/tambah') }}" method="POST">
                  {{ csrf_field() }}
                <div class="form-group">
                  <label for="inputEmail1">Tahunajaran</label>
                  <select name="idTahunajarank" class="custom-select form-control js-example-basic-single" id="">
                    @foreach ($tahunajaran as $ta)
                    <option value="{{$ta->idTahunajaran}}">{{$ta->semester}} / {{$ta->tahun}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail1">Kelas</label>
                  <select name="idKelask" class="custom-select  js-example-basic-single" id="">
                    @foreach ($kelas as $ks)
                    <option value="{{$ks->idKelas}}">{{$ks->kelas}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail1">Siswa</label>
                  <select name="idSiswak" class="custom-select form-control  js-example-basic-single" id="">
                    @foreach ($siswas as $s)
                    @if ($s->idSiswak == null)
                      <option value="{{$s->id}}">{{$s->name}}</option>
                        
                    @endif
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
              <p class="grid-header">Master data kelas</p>
              <div class="item-wrapper">
                  <div class="table-responsive">
                      <table class="table info-table">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Tahun ajaran</th>
                                  <th>Kelas</th>
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
                                  <td>{{$k->name}}</td>
                                  <td class="actions">
                                  <a href="/bk/masterkelassiswa/edit/{{$k->idKelassiswa}}" class="btn btn-rounded social-icon-btn btn-google"><i
                                          class="mdi mdi-square-edit-outline"></i></a>
                                  <a href="/bk/masterkelassiswa/hapus/{{$k->idKelassiswa}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$k->name}} ?')"><i class="mdi mdi-delete"></i></a>
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
