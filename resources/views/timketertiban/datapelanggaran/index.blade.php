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
                                    <label> Tahun ajaran</label>
                                    <select class="tahunajaran form-control js-example-basic-single" id="idTahunajarank" name="tahun" required>
                                        <option value="0" selected="true"> Pilih </option>
                                        @foreach ($kelassiswa as $key)
                                        <option value="{{$key->idTahunajaran}}">{{$key->tahun}}/{{$key->semester}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Kelas</label>
                                    <select class="kelas form-control js-example-basic-single" id="pilihkelas">
                                        <option value="0" selected="true"> Pilih </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Nama</label>
                                    <select class="namasiswa form-control js-example-basic-single" id="pilihsiswa" name="idKelassiswaP" required>
                                        <option value="0" selected="true"> Pilih </option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputPassword1">Kategori pelanggaran</label>
                                    <select class="js-example-basic-single form-control" name="idKategoripel"
                                        id="kategoripelanggaran" data-dependent="jenisPelanggaran" required>
                                        <option value=""> Pilih </option>
                                        @foreach ($ajax as $key =>$value)
                                        <option value="{{$key}}">{{$value}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Bentuk pelanggaran</label>
                                    <select class="js-example-basic-single form-control" name="idJenispelP"
                                        id="jenisPelanggaran" data-dependent="jenisPelanggaran" required>
                                        <option value=""> Pilih </option>
                                        @foreach ($poin as $key => $value)
                                        <option value="{{$key}}">{{$value}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label>Poin</label>
                                    <div class="form-group" id="poin">
                                        <input type="text" name="poin" class="form-control" readonly value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                        <input type="datetime" name="tanggalPelanggaran" class="form-control" readonly
                                        value="{{$a}}">
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="grid">
                    <p class="grid-header">Data pelanggaran</p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align:left">Nama siswa</th>
                                        <th style="text-align:left">Bentuk pelanggaran</th>
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
                                        <td style="text-align:left">{{$p->jenisPelanggaran}}</td>
                                        <td style="text-align:left">{{$p->poin}}</td>
                                        <td style="text-align:left">{{$p->tanggalPelanggaran}}</td>
                                        <td class="actions">
                                            <a href="/timketertiban/pelsiswa/hapus/{{$p->idPelanggaran}}"
                                                class="btn btn-rounded social-icon-btn btn-pinterest"
                                                onclick="return confirm('Apakah anda akan menghapus {{$p->jenisPelanggaran}} ?')"><i
                                                    class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <br>
                            {{ $pelanggaran->links() }}
                            Halaman : {{ $pelanggaran->currentPage() }} <br />
                            Jumlah Data : {{ $pelanggaran->total() }} <br />
                            Data Per Halaman : {{ $pelanggaran->perPage() }} <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.tahunajaran',function(){

			var cat_id=$(this).val();
			var test=$(this).parent();
			var op=" ";
			// console.log(cat_id);

			$.ajax({
				type:'get',
				url:'{!!URL::to('timketertiban/pelsiswa/findKelas')!!}',
				data:{'id':cat_id},
				success:function(data){
                    // console.log(data);

					op+='<option value="0" selected disabled>Pilih kelas</option>';
					for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].idKelas+'">'+data[i].kelas+'</option>';
				   }

					// console.log(op);
                    $('#pilihkelas').find("option")
                    .not(":first")
                    .remove();

                    $.each(data, function(key, value){
                    $("#pilihkelas").append(
                        $('<option></option>')
                        .attr("value", value.idKelas)
                        .text(value.kelas)
                    );
                    });
				},
				error:function(){
				}
			});
		}
        );
	});
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="tahun"]').on('change', function () {
            
            var baru = $(this).val();
            // console.log("coba:", baru);
            
            $(document).on('change', '.kelas', function () {
                
                var idKelas = $(this).val();	
                // console.log("idKelas:", idKelas);
                var div = $(this).parent();
                var op = " ";
            
            $.ajax({
                type: 'get',
                url: '{!!URL::to('timketertiban/pelsiswa/findSiswa')!!}', 
                data: {'id': idKelas, 'ids' :baru},
                success: function (data) {
                    // console.log(data);
                    // console.log(idKelas);
                    op += '<option value="0" selected disabled>Pilih siswa</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].idKelassiswa + '">' + data[i].name + '</option>';
                    }

                    $('#pilihsiswa').find("option")
                        .not(":first")
                        .remove();
                        // $('#pilihkelas').append(op);
                        $.each(data, function(key, value){
                        $("#pilihsiswa").append(
                            $('<option></option>')
                            .attr("value", value.idKelassiswa)
                            .text(value.name)
                        );
                        });
                },
                error: function () {
                }
            });
        });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('select[name="idKategoripel"]').on('change', function(){
            var idKategoripel = $(this).val();
            if(idKategoripel){
                $.ajax({
                    url: 'pelsiswa/bp/'+idKategoripel,
                    type: 'get',
                    dataType: 'json',
                    success:function(data){
                        // console.log(data);
                        
                        $('select[name="idJenispelP"]').empty();
                        $('select[name="idJenispelP"]').append('<option id="dummyOption">Pilih</option>')
                        $.each(data, function(key, value){

                        $('select[name="idJenispelP"]').append('<option value="'+key+'">'+ value +'</option>');
                        });

                        $('select[name="idJenispelP"]')

                    }
                })
            } 
            else{
                $('select[name="idJenispelP"]').empty();
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('select[name="idJenispelP"]').on('change', function(){
            var idJenispelP = $(this).val();
            // console.log('callback function invoked')

            if(idJenispelP){
                $.ajax({
                    url: 'pelsiswa/poin/'+idJenispelP,
                    type: 'get',
                    dataType: 'json',
                    success:function(data){
                        // console.log(data);
                        $('#dummyOption').remove()
                        $("#poin").empty();
                        $.each(data, function(key, value){
                            // value=idJenispelP;
                        $("#poin").append('<input name="poin" class="form-control" value="'+ value +'" readonly />');
                        });
                    }
                })
            } 
            else{
                $("#poin").empty();
            }
        });
    });
</script>    
@endsection