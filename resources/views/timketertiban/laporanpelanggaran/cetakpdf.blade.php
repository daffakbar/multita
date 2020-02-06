<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pelanggaran Siswa Per Kelas</title>
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
</head>
<body>
    <table>
        <tr>
            <td> <img src="{{asset('admin/assets/images/trimurti.gif')}}" style="height:20px;width:20px"></td>
        </tr>
        <tr>
            <td>
                <h4>Sekolah Menengah Atas Trimurti Surabaya</h2>
                <p style="line-height: 0.5">JL. GUBERNUR SURYO 3, Embong Kaliasin, Kota Surabaya</p>
            </td>
        </tr>
    </table>
    <center>
		<h4>Sekolah Menengah Atas Trimurti Surabaya</h2>
		<p style="line-height: 0.5">JL. GUBERNUR SURYO 3, Embong Kaliasin, Kota Surabaya</p>
        <hr>
        <h5 style="line-height: 0.8">Laporan Pelanggaran Siswa Per Kelas</h5>
        @foreach ($ta as $t)
        <h5 style="line-height: 0.7">Semester {{$t->semester}}</h5>
        <h5 style="line-height: 0.7">Tahun ajaran {{$t->tahun}}</h5>
        @endforeach
		{{-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h2> --}}
	</center>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th style="text-align:left">Nama</th>
                <th style="text-align:left">Kelas</th>
                <th style="text-align:left">Kategori pelanggaran</th>
                <th style="text-align:left">Jenis pelanggaran</th>
                <th style="text-align:left">Poin</th>
                <th style="text-align:left">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($pilihkelas as $pk)
            <tr>
                <td>{{$no++}}</td>
                <td style="text-align:left">{{$pk->name}}</td>
                {{-- <td style="text-align:left">{{$pk->semester}}</td> --}}
                <td style="text-align:left">{{$pk->kelas}}</td>
                <td style="text-align:left">{{$pk->kategoripelanggaran}}</td>
                <td style="text-align:left">{{$pk->jenisPelanggaran}}</td>
                <td style="text-align:left">{{$pk->poin}}</td>
                <td style="text-align:left">{{$pk->tanggalPelanggaran}}</td>
            </tr>    
            @endforeach
        </tbody>
    </table>    
</body>
                          