<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PelanggaranSiswa;
use Illuminate\Database\Eloquent\Model;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = DB::table('kelassiswas as ks')
        ->join('siswas as s','ks.idSiswak','=','s.id')
        ->paginate(5);
        // dd($siswas);
        $kategoripres = DB::table('master_jenispres as jp')
        ->join('master_kategoriprestasi as kp','jp.idKategoripresJP','=','kp.idKategoripres')
        ->paginate(5);
        $prestasi = DB::table('prestasi_siswas as ps')
        ->join('kelassiswas as ks','ps.idKelassiswaPres','=','ks.idKelassiswa')
        ->join('siswas as s','ks.idSiswak','=','s.id')
        ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        ->join('master_kategoriprestasi as kp','jp.idKategoripresJP','=','kp.idKategoripres')
        ->get();

        $xxx = DB::table('prestasi_siswas as ps')
        ->join('kelassiswas as ks','ps.idKelassiswaPres','=','ks.idKelassiswa')
        ->join('siswas as s','ks.idSiswak','=','s.id')
        ->where('s.nis','=','213255')
        // ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        // ->join('master_kategoriprestasi as kp','jp.idKategoripresJP','=','kp.idKategoripres')
        ->get();
        // dd($xxx);

        // dd($prestasi);
        return view('timketertiban.dataprestasi.index',compact('siswas','kategoripres','prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prestasi = DB::table('prestasi_siswas')->insert([
            'idKelassiswapres' =>$request->idKelassiswapres,
            'idJenispresP' => $request->idJenispresP,
            'tanggalPrestasi' => $request->tanggalPrestasi
        ]);
        
        $sanksi = DB::table('master_sanksi')
        ->get();
        $getprestasi = DB::table('prestasi_siswas as ps')
        ->join('kelassiswas as ks','ps.idKelassiswaPres','=','ks.idKelassiswa')
        ->join('siswas as s','ks.idSiswak','=','s.id')
        ->where('s.nis','=',$request->idKelassiswapres)
        ->get();
        $pelanggaran = DB::table('pelanggaran_siswas')
        ->get();
        
        $history = DB::table('history')->insert([
            'idPrestasiH' => $request->idPrestasiH
        ]);
         
        

        return redirect('timketertiban/pressiswa')->with('success', 'Data Berhasil di Tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('prestasi_siswas')->where('idPrestasi', $id)->delete();

        return redirect('timketertiban/pressiswa')->with('success', 'Data Berhasil di Hapus!');
    }
}
