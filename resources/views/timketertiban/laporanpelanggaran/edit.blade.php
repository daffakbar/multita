@extends('timketertiban.layout.auth')

@section('content')
<div class="container">

<div class="content-viewport">
  <a href="{{ url('timketertiban/masterjenispres/') }}">
      <div class="btn btn-warning has-icon btn-rounded">
      <i class="mdi mdi-arrow-left-bold"></i>Kembali
    </div>
  </a>
    <br>
    <br>
    <div class="col-lg-6 equel-grid">
      <div class="grid">
        <p class="grid-header">Edit Data Jenis Prestasi</p>
        <div class="grid-body">
          <div class="item-wrapper">  
            @foreach ($jenispresedit as $jp)
                
            
            <form action="/timketertiban/masterjenispres/update" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $jp->id }}"> <br/>
              <div class="form-group">
                <label for="kelas">Jenis Prestasi</label>
                <input type="text" class="form-control" name="jenispres" value="{{$jp->jenisPrestasi}}">
              </div>
              <div class="form-group">
                <label for="kelas">Poin</label>
                <input type="text" class="form-control" name="poin" value="{{$jp->poin}}">
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
