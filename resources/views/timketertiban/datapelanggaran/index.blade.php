@extends('timketertiban.layout.auth')

@section('content')
<div class="container">

    <div class="content-viewport">

        <div class="row">
            <div class="col-lg-4 equel-grid">
                <div class="grid">
                    <p class="grid-header">Pelanggaran siswa</p>
                    <div class="grid-body">
                        <div class="item-wrapper">
                            <form action="{{action('PelanggaranController@create')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputPassword1">Nama siswa</label>
                                    <select class="js-example-basic-single form-control" name="idKelassiswaP">
                                        @foreach ($siswas as $s)
                                        <option value="{{ $s->idKelassiswa}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                      <label for="inputPassword1">Kategori pelanggaran</label>
                      <select class="js-example-basic-single form-control">
                        @foreach ($kategoripel as $kp)
                        <option value="{{$kp->idJenispel}}">{{$kp->kategoripelanggaran}}</option>

                                </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="inputPassword1">Kategori pelanggaran</label>
                            <select class="js-example-basic-single form-control" name="idJenispelP" id="kategori" data-dependent="jenis">
                                @foreach ($kategoripel as $kp)
                                <option value="{{$kp->idJenispel}}">{{$kp->jenisPelanggaran}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword1">Jenis pelanggaran</label>
                            <select class="js-example-basic-single form-control" id="jenis" data-dependent="poin">
                                
                                <option value="">{{$kp->jenisPelanggaran}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Poin</label>
                            <input type="text" class="form-control" id="poin" readonly="readonly"
                                value="{{$kp->poin}}">
                            

                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggalPelanggaran" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="grid">
                <p class="grid-header">Master data pelanggaran</p>
                <div class="item-wrapper">
                    <div class="table-responsive">
                        <table class="table info-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="text-align:left">Nama siswa</th>
                                    <th style="text-align:left">Kategori</th>
                                    <th style="text-align:left">Jenis</th>
                                    <th style="text-align:left">Poin</th>
                                    <th style="text-align:left">Tanggal</th>
                                    <th style="text-align:left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td style="text-align:left"></td>
                                    <td style="text-align:left"></td>
                                    <td style="text-align:left"></td>
                                    <td style="text-align:left"></td>
                                    <td style="text-align:left"></td>
                                    <td class="actions">
                                        <a href="/timketertiban/mastersanksi/edit/"
                                            class="btn btn-rounded social-icon-btn btn-google"><i
                                                class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="/timketertiban/mastersanksi/hapus/"
                                            class="btn btn-rounded social-icon-btn btn-pinterest"
                                            onclick="return confirm('Apakah anda akan menghapus ?')"><i
                                                class="mdi mdi-delete"></i></a>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
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