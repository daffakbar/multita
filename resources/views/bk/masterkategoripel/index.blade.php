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
                    <form action="{{ url('bk/masterkategoripel/tambah') }}" method="POST">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="inputEmail1">Kategori pelanggaran</label>
                        <input type="text" class="form-control" name="kategoripel" placeholder="" required>
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
            <div class="col-lg-5">
                <div class="grid">
                    <p class="grid-header">Master data kategori pelanggaran</p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align:left;">Kategori pelanggaran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                     $no = 1   
                                    @endphp
                                    @foreach ($kategoripel as $kp)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td style="text-align:left;">{{$kp->kategoripelanggaran}}</td>
                                        <td class="actions">
                                            <a href="/bk/masterkategoripel/edit/{{$kp->idKategoripel}}" class="btn btn-rounded social-icon-btn btn-google"><i
                                                    class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="/bk/masterkategoripel/hapus/{{$kp->idKategoripel}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$kp->kategoripelanggaran}} ?')"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $kategoripel->links() }}
                            Halaman : {{ $kategoripel->currentPage() }} <br/>
                            Jumlah Data : {{ $kategoripel->total() }} <br/>
                            Data Per Halaman : {{ $kategoripel->perPage() }} <br/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
