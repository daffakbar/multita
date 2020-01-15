@extends('timketertiban.layout.auth')

@section('content')
<div class="container">
    <br>
    <div class="btn btn-success has-icon" data-toggle="modal" data-target="#exampleModal">
        <i class="mdi mdi-clipboard-outline link-icon"></i>Tambah data
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="grid">
                <div class="grid-body">
                  <div class="item-wrapper">
                    <form action="{{ url('timketertiban/masterjenispres/tambah') }}" method="POST">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label >Kategori prestasi</label>
                        <select name="idKategoripresJP" class="custom-select form-control" id="">
                          @foreach ($kategoripres as $kp)
                          <option value="{{$kp->idKategoripres}}">{{$kp->kategoriprestasi}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label >Jenis Prestasi</label>
                        <input type="text" class="form-control" name="jenisPres" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="inputEmail1">Poin</label>
                        <input type="number" class="form-control" name="poin" placeholder="">
                      </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>

    <br>
    <br> 
    <div class="content-viewport">
        <div class="row">
            <div class="col-lg-9">
                <div class="grid">
                    <p class="grid-header">Master data jenis prestasi</p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align: left">Kategori Prestasi</th>
                                        <th style="text-align: left">Jenis Prestasi</th>
                                        <th>Poin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($jenispres as $jp)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td style="text-align: left">{{$jp->kategoriprestasi}}</td>
                                        <td style="text-align: left">{{$jp->jenisPrestasi}}</td>
                                        <td>{{$jp->poin}}</td>
                                        <td class="actions">
                                        {{-- <a href="/timketertiban/masterjenispres/edit/{{$jp->idJenispres}}" class="btn btn-rounded social-icon-btn btn-google"><i
                                                class="mdi mdi-square-edit-outline"></i></a> --}}
                                        <a href="/timketertiban/masterjenispres/hapus/{{$jp->idJenispres}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$jp->jenisPrestasi}} ?')"><i class="mdi mdi-delete"></i></a>
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
