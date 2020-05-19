@extends('bk.layout.auth')

@section('content')
<div class="container">

<div class="content-viewport">
  <a href="{{ url('bk/masterwalmur/') }}">
      <div class="btn btn-warning has-icon btn-rounded">
      <i class="mdi mdi-arrow-left-bold"></i>Kembali
    </div>
  </a>
    <br>
    <br>
    <div class="col-lg-6 equel-grid">
      <div class="grid">
        <p class="grid-header">Edit Data Wali Murid</p>
        <div class="grid-body">
          <div class="item-wrapper">  
            @foreach ($walmuredit as $wm)
            <form action="/bk/masterwalmur/update" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $wm->id }}"> <br/>
              <div class="form-group">
                <label for="kelas">Nama Wali Murid</label>
                <input type="text" class="form-control" name="namaWalimurid" value="{{$wm->namewm}}">
              </div>
              <div class="form-group">
                <label for="kelas">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{$wm->alamat}}">
              </div>
              <div class="form-group">
                <label for="kelas">No Hp</label>
                <input type="text" class="form-control" name="noHp" value="{{$wm->noHp}}">
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
