@extends('bk.layout.auth')

@section('content')
<div class="container">

    	{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
        @endif
        
    <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
        IMPORT EXCEL
    </button>

    		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="POST" action="/bk/mastersiswa/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
        </div>
        <br><br>

    <div class="content-viewport">
        <div class="row">
            <div class="col-lg-12">
                <div class="grid">
                    <p class="grid-header">Master data siswa</p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <!-- <th>No</!-->
                                        <th>Nis</th>
                                        <th style="text-align:left;">Nama</th>
                                        <!-- <th>Jenis Kelamin</th> -->
                                        <th>Jenis kelamin</th>
                                        <th>Agama</th>
                                        <th>Password</th>
                                        <!-- <th>Profit</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $s)
                                    <tr>
                                        <td>{{$s->nis}}</td>
                                        <td>{{$s->name}}</td>
                                        <td>{{$s->jenisKelamin}}</td>
                                        <td>{{$s->agama}}</td>
                                        <td>{{$s->password}}</td>
                                        <td class="actions">
                                        <a href="/bk/mastersiswa/edit/{{$s->nis}}" class="btn btn-rounded social-icon-btn btn-google"><i
                                                class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="/bk/mastersiswa/hapus/{{$s->nis}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$s->name}} ?')"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $siswa->links() }}
                            Halaman : {{ $siswa->currentPage() }} <br/>
                            Jumlah Data : {{ $siswa->total() }} <br/>
                            Data Per Halaman : {{ $siswa->perPage() }} <br/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection