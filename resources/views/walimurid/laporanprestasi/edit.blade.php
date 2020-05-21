@extends('bk.layout.auth')

@section('content')
<div class="container">

<div class="content-viewport">
  <a href="{{ url('bk/masterkelas/') }}">
      <div class="btn btn-warning has-icon btn-rounded">
      <i class="mdi mdi-arrow-left-bold"></i>Kembali
    </div>
  </a>
    <br>
    <br>
    <div class="col-lg-6 equel-grid">
      <div class="grid">
        <p class="grid-header">Edit Data Kelas</p>
        <div class="grid-body">
          <div class="item-wrapper">  
            @foreach ($kelasedit as $k)
                
            
            <form action="/bk/masterkelas/update" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $k->id }}"> <br/>
              <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" class="form-control" name="kelas" value="{{$k->kelas}}">
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
