@extends('timketertiban.layout.auth')

@section('content')
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
                    <form action="{{ url('timketertiban/masterjenispel/tambah') }}" method="POST">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label >Kategori pelanggaran</label>
                        <select name="idKategori" class="custom-select form-control" id="">
                          @foreach ($kategoripel as $kp)
                          <option value="{{$kp->idKategoripel}}">{{$kp->kategoripelanggaran}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label >Bentuk Pelanggaran</label>
                        <input type="text" class="form-control" name="jenisPel" placeholder="">
                      </div>
                      <div class="form-group">
                        <label >Poin</label>
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
            <div class="col-lg-8">
                <div class="grid">
                    <p class="grid-header">Master data bentuk pelanggaran</p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        {{-- <th style="text-align: left">Kategori pelanggaran</th> --}}
                                        <th style="text-align: left">Bentuk pelanggaran</th>
                                        <th>Poin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($jenispel as $jp)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        {{-- <td style="text-align: left">{{$jp->kategoripelanggaran}}</td> --}}
                                        <td style="text-align: left">{{$jp->jenisPelanggaran}}</td>
                                        <td>{{$jp->poin}}</td>
                                        <td class="actions">
                                        {{-- <i href="/timketertiban/masterjenispel/edit/{{$jp->idJenispel}}" class="btn btn-rounded social-icon-btn btn-google"><i --}}
                                                {{-- class="mdi mdi-square-edit-outline"></i></i> --}}
                                        <a href="/timketertiban/masterjenispel/hapus/{{$jp->idJenispel}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$jp->jenisPelanggaran}} ?')"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $jenispel->links() }}
                            Halaman : {{ $jenispel->currentPage() }} <br/>
                            Jumlah Data : {{ $jenispel->total() }} <br/>
                            Data Per Halaman : {{ $jenispel->perPage() }} <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
