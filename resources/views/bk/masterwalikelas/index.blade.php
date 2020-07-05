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
                    <form action="{{ url('bk/masterwalikelas/tambah') }}" method="POST">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="inputEmail1">Nama wali kelas</label>
                        <input type="text" class="form-control" name="name" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="" required>
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
            <div class="col-lg-6">
                <div class="grid">
                    <p class="grid-header">Master data Wali kelas</p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($walikelas as $k)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$k->namewk}}</td>
                                        <td>{{$k->email}}</td>
                                        {{-- <td>{{$k->password}}</td> --}}
                                        <td class="actions">
                                        <a href="/bk/masterwalikelas/edit/{{$k->id}}" class="btn btn-rounded social-icon-btn btn-google"><i
                                                class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="/bk/masterwalikelas/hapus/{{$k->id}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$k->namewk}} ?')"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $walikelas->links() }}
                            Halaman : {{ $walikelas->currentPage() }} <br/>
                            Jumlah Data : {{ $walikelas->total() }} <br/>
                            Data Per Halaman : {{ $walikelas->perPage() }} <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
