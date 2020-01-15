@extends('bk.layout.auth')

@section('content')
<div class="container">

<div class="content-viewport">
  <a href="{{ url('bk/mastersiswa/') }}">
      <div class="btn btn-warning has-icon btn-rounded">
      <i class="mdi mdi-arrow-left-bold"></i>Kembali
    </div>
  </a>
    <br>
    <br>
    <div class="col-lg-6 equel-grid">
      <div class="grid">
        <p class="grid-header">Edit Data Siswa</p>
        <div class="grid-body">
          <div class="item-wrapper">  
            @foreach ($siswaedit as $s)
                
            
            <form action="/bk/mastersiswa/update" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $s->id }}"> <br/>
              <div class="form-group">
                <label for="kelas">NIS</label>
                <input type="text" class="form-control" name="nis" value="{{$s->nis}}">
              </div>
              <div class="form-group">
                <label for="kelas">Nama Siswa</label>
                <input type="text" class="form-control" name="namaSiswa" value="{{$s->name}}">
              </div>
              <div class="form-group">
                <label for="kelas">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenisKelamin" value="{{$s->jenisKelamin}}">
              </div>
              <div class="form-group">
                <label for="kelas">Agama</label>
                <input type="text" class="form-control" name="agama" value="{{$s->agama}}">
              </div>
              <div class="form-group">
                <label for="kelas">Password</label>
                <input type="text" class="form-control" name="password" value="{{$s->password}}">
              </div>
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </form>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>    
</div>
@endsection
