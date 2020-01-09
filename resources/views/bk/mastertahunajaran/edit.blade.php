@extends('bk.layout.auth')

@section('content')
<div class="container">

<div class="content-viewport">
  <a href="{{ url('bk/mastertahunajaran/') }}">
      <div class="btn btn-warning has-icon btn-rounded">
      <i class="mdi mdi-arrow-left-bold"></i>Kembali
    </div>
  </a>
    <br>
    <br>
    <div class="col-lg-6 equel-grid">
      <div class="grid">
        <p class="grid-header">Edit Data Tahun Ajaran</p>
        <div class="grid-body">
          <div class="item-wrapper">  
            @foreach ($tahunajaranedit as $ta)
            <form action="/bk/mastertahunajaran/update" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="idTahunajaran" value="{{ $ta->idTahunajaran }}"> <br/>
              <div class="form-group">
                <label for="kategoripelanggaran">Semester</label>
                <input type="text" class="form-control" name="semester" value="{{$ta->semester}}">
              </div>
              <div class="form-group">
                <label for="kategoripelanggaran">Tahun</label>
                <input type="text" class="form-control" name="tahun" value="{{$ta->tahun}}">
              </div>
              <div class="form-group">
                <label for="kategoripelanggaran">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tanggalMulai" value="{{$ta->tanggalMulai}}">
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
