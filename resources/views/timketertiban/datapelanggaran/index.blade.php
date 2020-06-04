@extends('timketertiban.layout.auth')

@section('content')

<div class="container">
    <div class="content-viewport">
        <div class="row">
            
        </div>
    </div>
</div>
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
                            <select class="js-example-basic-single form-control" name="idKategoripel" id="kategoripelanggaran" data-dependent="jenisPelanggaran">
                                <option value=""> Pilih </option>
                                @foreach ($ajax as $key =>$value)
                                <option value="{{$key}}">{{$value}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"> 
                            <label for="inputPassword1">Bentuk pelanggaran</label>
                            <select class="js-example-basic-single form-control" name="idJenispelP" id="bentukpelanggaran" data-dependent="jenisPelanggaran">
                                <option value=""> Pilih </option>
                              @foreach ($poin as $key => $value)
                              <option value="{{$key}}">{{$value}} </option>
                              @endforeach
                            </select>
                        </div>

                        <div>
                            <label >Poin</label>
                            <div class="form-group" id="poin">
                                <input type="text" name="poin" class="form-control" readonly value="">
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="datetime" name="tanggalPelanggaran" class="form-control" readonly value="{{$a}}">
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
                                    <th style="text-align:left">Kategori</th>
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
                                    <td style="text-align:left">{{$p->kategoripelanggaran}}</td>
                                    <td style="text-align:left">{{$p->jenisPelanggaran}}</td>
                                    <td style="text-align:left">{{$p->poin}}</td>
                                    <td style="text-align:left">{{$p->tanggalPelanggaran}}</td>
                                    <td class="actions">
                                        <a href="/timketertiban/pelsiswa/hapus/{{$p->idPelanggaran}}" class="btn btn-rounded social-icon-btn btn-pinterest" onclick="return confirm('Apakah anda akan menghapus {{$p->jenisPelanggaran}} ?')"><i class="mdi mdi-delete"></i></a>
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
@section('footer')
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
            console.log('callback function invoked')

            if(idJenispelP){
                $.ajax({
                    url: 'pelsiswa/poin/'+idJenispelP,
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
