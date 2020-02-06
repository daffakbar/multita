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
                            <form action="{{ url('timketertiban/pelsiswa/tambah') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputPassword1">Nama siswa</label>
                                    <select class="js-example-basic-single form-control" name="idKelassiswaP">
                                        @foreach ($siswas as $s)
                                        <option value="{{ $s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                      <label for="inputPassword1">Kategori pelanggaran</label>
                      <select class=" form-control" name="idJenispelP" id="kategoripelanggaran" data-dependent="jenisPelanggaran">
                          <option value=""> Pilih aku mas</option>
                        @foreach ($ajax as $kp)
                        <option value="{{$kp->idKategoripel}}">{{$kp->kategoripelanggaran}} </option>
                        @endforeach
                                </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="inputPassword1">Kategori pelanggaran</label>
                            <select class="js-example-basic-single form-control dynamic" name="idKategoripelJP" id="idKategoripelJP" data-dependent="jenisPelanggaran">
                                @foreach ($ajax as $kp)
                                <option value="{{$kp->idKategoripelJP}}">{{$kp->idKategoripelJP}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="inputPassword1">Jenis pelanggaran</label>
                            <select class=" form-control dynamic" id="jenisPelanggaran" data-dependent="poin">                      
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Poin</label>
                            <input type="text" class="form-control" id="poin" readonly="readonly" value="">
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
                                @php $no = 1 @endphp
                                @foreach ($pelanggaran as $p)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td style="text-align:left">{{$p->name}}</td>
                                    <td style="text-align:left">{{$p->kategoripelanggaran}}</td>
                                    <td style="text-align:left">{{$p->jenisPelanggaran}}</td>
                                    <td style="text-align:left">{{$p->poin}}</td>
                                    <td style="text-align:left">{{$p->tanggalPelanggaran}}</td>
                                    <td class="actions">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $pelanggaran->links() }}
                        Halaman : {{ $pelanggaran->currentPage() }} <br/>
                        Jumlah Data : {{ $pelanggaran->total() }} <br/>
                        Data Per Halaman : {{ $pelanggaran->perPage() }} <br/> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
