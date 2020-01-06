@extends('bk.layout.auth')

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
                    <form action="{{ url('bk/mastertahunajaran/tambah') }}" method="POST">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="inputEmail1">Semester</label>
                        <input type="text" class="form-control" name="semester" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="inputEmail1">Tahun</label>
                        <input type="text" class="form-control" name="tahun" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="inputEmail1">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tanggalMulai" placeholder="">
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
            <div class="col-lg-7">
                <div class="grid">
                    <p class="grid-header">Master data tahun ajaran</p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Semester</th>
                                        <th>Tahun</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                     $no = 1   
                                    @endphp
                                    @foreach ($tahunajaran as $ta)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$ta->semester}}</td>
                                        <td>{{$ta->tahun}}</td>
                                        <td>{{$ta->tanggalMulai}}</td>
                                        <td class="actions">
                                        <a href="/bk/mastertahunajaran/edit/{{$ta->id}}" class="btn btn-rounded social-icon-btn btn-google"><i
                                                class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="/bk/mastertahunajaran/hapus/{{$ta->id}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$ta->semester}} ?')"><i class="mdi mdi-delete"></i></a>
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
