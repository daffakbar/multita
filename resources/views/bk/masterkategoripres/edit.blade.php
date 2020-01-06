@extends('bk.layout.auth')

@section('content')
<div class="container">

<div class="content-viewport">
  <a href="{{ url('bk/masterkategoripres/') }}">
      <div class="btn btn-warning has-icon btn-rounded">
      <i class="mdi mdi-arrow-left-bold"></i>Kembali
    </div>
  </a>
    <br>
    <br>
    <div class="col-lg-6 equel-grid">
      <div class="grid">
        <p class="grid-header">Edit Data Kategori Prestasi</p>
        <div class="grid-body">
          <div class="item-wrapper">  
            @foreach ($kategoripresedit as $kp)
                
            
            <form action="/bk/masterkategoripres/update" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $kp->id }}"> <br/>
              <div class="form-group">
                <label for="kategoriprestasi">Kategori Prestasi</label>
                <input type="text" class="form-control" name="kategoripres" value="{{$kp->kategoriprestasi}}">
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
