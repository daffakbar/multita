@extends('timketertiban.layout.auth')

@section('content')
<div class="container">

<div class="content-viewport">
  <a href="{{ url('timketertiban/mastersanksi/') }}">
      <div class="btn btn-warning has-icon btn-rounded">
      <i class="mdi mdi-arrow-left-bold"></i>Kembali
    </div>
  </a>
    <br>
    <br>
    <div class="col-lg-6 equel-grid">
      <div class="grid">
        <p class="grid-header">Edit Data Sanksi</p>
        <div class="grid-body">
          <div class="item-wrapper">  
            @foreach ($sanksiedit as $s)
                
            
            <form action="/timketertiban/mastersanksi/update" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="idSanksi" value="{{ $s->idSanksi }}"> <br/>
              <div class="form-group">
                <label for="kelas">Sanksi</label>
                <input type="text" class="form-control" name="sanksi" value="{{$s->sanksi}}">
              </div>
              <div class="form-group">
                <label for="kelas">Batas poin awal</label>
                <input type="text" class="form-control" name="batasAwal" value="{{$s->batasAwal}}">
              </div>
              <div class="form-group">
                <label for="kelas">Batas poin akhir</label>
                <input type="text" class="form-control" name="batasAkhir" value="{{$s->batasAkhir}}">
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
