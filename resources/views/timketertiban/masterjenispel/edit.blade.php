@extends('timketertiban.layout.auth')

@section('content')
<div class="container">

<div class="content-viewport">
  <a href="{{ url('timketertiban/masterjenispel/') }}">
      <div class="btn btn-warning has-icon btn-rounded">
      <i class="mdi mdi-arrow-left-bold"></i>Kembali
    </div>
  </a>
    <br>
    <br>
    <div class="col-lg-6 equel-grid">
      <div class="grid">
        <p class="grid-header">Edit Data Jenis Pelanggaran</p>
        <div class="grid-body">
          <div class="item-wrapper">  
            @foreach ($jenispeledit as $jp)
            <form action="/timketertiban/masterjenispel/update" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $jp->idJenispel }}"> <br/>
              <div class="form-group">
                <label for="kelas">Kategori Pelanggaran</label>
                <select name="idKategoripel" class="custom-select form-control" id="">
                  {{-- @foreach ($kategoripeledit as $kp) --}}
                  <option placeholder="{{$jp->idKategoripel}}" >{{$jp->idKategoripel}}</option>                      
                  {{-- @endforeach --}}

                </select>
              </div>
              <div class="form-group">
                <label for="kelas">Jenis Pelanggaran</label>
                <input type="text" class="form-control" name="jenispel" value="{{$jp->jenisPelanggaran}}">
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
