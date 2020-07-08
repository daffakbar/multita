@extends('timketertiban.layout.auth')

@section('content')

<div class="container">
   
    <div class="content-viewport">

        <div class="row">
          <div class="col-lg-4 equel-grid">
            <div class="grid">
              <p class="grid-header">Prestasi siswa</p>
              <div class="grid-body">
                <div class="item-wrapper">
                  <form action="{{ url('timketertiban/pressiswa/tambah') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label> Tahun ajaran</label>
                        <select class="tahunajaran form-control" id="idTahunajarank" name="tahun" required>
                            <option value="0" selected="true"> Pilih </option>
                            @foreach ($kelassiswa as $key)
                            <option value="{{$key->idTahunajaran}}">{{$key->tahun}}/{{$key->semester}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Kelas</label>
                        <select class="kelas form-control" id="pilihkelas">
                            <option value="0" selected="true"> Pilih </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Nama</label>
                        <select class="namasiswa form-control" id="pilihsiswa" name="idKelassiswapres" required>
                            <option value="0" selected="true"> Pilih </option>
                        </select>
                    </div>

                    <div class="form-group"> 
                      <label for="inputPassword1">Kategori prestasi</label>
                      <select class="js-example-basic-single form-control" name="idKategoripres" id="kategoriprestasi" data-dependent="jenisPrestasi" required>
                          <option value=""> Pilih </option>
                          @foreach ($ajax as $key =>$value)
                          <option value="{{$key}}">{{$value}} </option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group"> 
                    <label for="inputPassword1">Bentuk prestasi</label>
                    <select class="js-example-basic-single form-control" name="idJenispresP" id="bentukprestasi" data-dependent="jenisPrestasi" required>
                        <option value=""> Pilih </option>
                      @foreach ($poin as $key => $value)
                      <option value="{{$key}}">{{$value}} </option>
                      @endforeach
                    </select>
                </div>

                {{-- <div class="form-group">
                      <label for="inputPassword1">Bentuk prestasi</label>
                      <select class="js-example-basic-single form-control" name="idJenispresP">
                        
                        @foreach ($kategoripres as $kp)
                        <option value="{{$kp->idJenispres}}">{{$kp->jenisPrestasi}} / {{$kp->poin}} </option>
                        @endforeach
                        
                    </select>
                    </div> --}}
                    <div>
                        <label >Poin</label>
                        <div class="form-group" id="poin">
                            <input type="text" name="poin" class="form-control" readonly value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="datetime" name="tanggalPrestasi" class="form-control" readonly value="{{$a}}">
                    </div>

                    {{-- <div class="form-group">
                      <label for="">Tanggal</label>
                      <input type="date" class="form-control" name="tanggalPrestasi">
                    </div> --}}
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
            <div class="col-lg-8">
                <div class="grid">
                    <p class="grid-header">Data prestasi</p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align:left">Nama siswa</th>
                                        {{-- <th style="text-align:left">Kategori</th> --}}
                                        <th style="text-align:left">Bentuk prestasi</th>
                                        <th style="text-align:left">Poin</th>
                                        <th style="text-align:left">Tanggal</th>
                                        <th style="text-align:left">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @php $no = 1 @endphp
                                  @foreach ($prestasi as $p)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td style="text-align:left">{{$p->name}}</td>
                                        {{-- <td style="text-align:left">{{$p->kategoriprestasi}}</td> --}}
                                        <td style="text-align:left">{{$p->jenisPrestasi}}</td>
                                        <td style="text-align:left">{{$p->poin}}</td>
                                        <td style="text-align:left">{{$p->tanggalPrestasi}}</td>
                                        <td class="actions">
                                        {{-- <a href="/timketertiban/mastersanksi/edit/" class="btn btn-rounded social-icon-btn btn-google"><i
                                                class="mdi mdi-square-edit-outline"></i></a> --}}
                                        <a href="/timketertiban/pressiswa/hapus/{{$p->idPrestasi}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$p->jenisPrestasi}} ?')"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    @endforeach    
                                </tbody>
                            </table>
                            <br>
                            {{ $prestasi->links() }}
                        Halaman : {{ $prestasi->currentPage() }} <br/>
                        Jumlah Data : {{ $prestasi->total() }} <br/>
                        Data Per Halaman : {{ $prestasi->perPage() }} <br/>
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
			console.log(cat_id);

			$.ajax({
				type:'get',
				url:'{!!URL::to('timketertiban/pressiswa/findKelas')!!}',
				data:{'id':cat_id},
				success:function(data){
                    console.log(data);

					op+='<option value="0" selected disabled>Pilih kelas</option>';
					for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].idKelas+'">'+data[i].kelas+'</option>';
				   }

					console.log(op);
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
            console.log("coba:", baru);
            
            $(document).on('change', '.kelas', function () {
                
                var idKelas = $(this).val();	
                console.log("idKelas:", idKelas);
                var div = $(this).parent();
                var op = " ";
            
            $.ajax({
                type: 'get',
                url: '{!!URL::to('timketertiban/pressiswa/findSiswa')!!}', 
                data: {'id': idKelas, 'ids' :baru},
                success: function (data) {
                    console.log(data);
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
        $('select[name="idKategoripres"]').on('change', function(){
            var idKategoripres = $(this).val();
            if(idKategoripres){
                $.ajax({
                    url: 'pressiswa/bp/'+idKategoripres,
                    type: 'get',
                    dataType: 'json',
                    success:function(data){
                        // console.log(data);
                        
                        $('select[name="idJenispresP"]').empty();
                        $('select[name="idJenispresP"]').append('<option id="dummyOption">Pilih</option>')
                        $.each(data, function(key, value){

                        $('select[name="idJenispresP"]').append('<option value="'+key+'">'+ value +'</option>');
                        });

                        $('select[name="idJenispresP"]')

                    }
                })
            } 
            else{
                $('select[name="idJenispresP"]').empty();
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('select[name="idJenispresP"]').on('change', function(){
            var idJenispresP = $(this).val();
            console.log('callback function invoked')

            if(idJenispresP){
                $.ajax({
                    url: 'pressiswa/poin/'+idJenispresP,
                    type: 'get',
                    dataType: 'json',
                    success:function(data){
                        console.log(data);
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