<!DOCTYPE html>
<html>

<head>
    <title>Laporan Prestasi Siswa Per Kelas</title>
    
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }
</style>

<body>
    <center>
        <h2>SMA Trimurti Surabaya</h2>
        <p style="line-height: 0.5">JL. GUBERNUR SURYO 3, Embong Kaliasin, Kota Surabaya</p>
        <hr>
        <h3 style="line-height: 0.8">Laporan Prestasi Siswa Per Kelas</h3>
        @foreach ($ta as $t)
        <h4 style="line-height: 0.7">Semester {{$t->semester}}</h4>
        <h4 style="line-height: 0.7">Tahun ajaran {{$t->tahun}}</h4>
        @endforeach

    </center>
    <table style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th style="text-align:left">Nama</th>
                <th style="text-align:left">Kelas</th>

                <th style="text-align:left">Bentuk prestasi</th>
                <th style="text-align:left">Poin</th>
                <th style="text-align:left">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($pilihkelas as $pk)
            <tr style="border: grey">
                <td>{{$no++}}</td>
                <td style="text-align:left">{{$pk->name}}</td>
                {{-- <td style="text-align:left">{{$pk->semester}}</td> --}}
                <td style="text-align:left">{{$pk->kelas}}</td>
                {{-- <td style="text-align:left">{{$pk->kategoripelanggaran}}</td> --}}
                <td style="text-align:left">{{$pk->jenisPrestasi}}</td>
                <td style="text-align:left">{{$pk->poin}}</td>
                <td style="text-align:left">{{$pk->tanggalPrestasi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>