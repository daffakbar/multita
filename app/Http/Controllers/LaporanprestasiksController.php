<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use PDF;

class LaporanprestasiksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pilihkelas = DB::table('siswas as s')->
        join('kelassiswas as ks', 's.id', '=', 'ks.idSiswak')->
        join('master_kelas as k', 'ks.idKelask', '=', 'k.idKelas')->
        // join('master_kelas as k', 'ks.idKelask', '=', 'k.idKelas')->
        join('prestasi_siswas as p', 's.id', '=', 'p.id_siswa')->
        join('master_jenispres as jp', 'p.idJenispresP', '=', 'jp.idJenispres')->
        join('master_kategoriprestasi as kp', 'jp.idKategoripresJP', '=', 'kp.idKategoripres')->
        // where('k.idKelas','=',$request->idKelas)->
        join('master_tahunajaran as ta', 'ks.idTahunajarank', '=', 'ta.idTahunajaran')->
        orderBy('s.name','asc','k.kelas')->
        // paginate(10);
        get();
        
        $kelas = DB::table('master_kelas')->
        get();
        // dd($pilihkelas);
        
        return view('kepalasekolah.laporanprestasi.index', compact('pilihkelas', 'kelas'));
    }

    public function cetakpdf(Request $request)
    {
        $pilihkelas = DB::table('siswas as s')->
        join('kelassiswas as ks', 's.id', '=', 'ks.idSiswak')->
        join('master_kelas as k', 'ks.idKelask', '=', 'k.idKelas')->
        // join('master_kelas as k', 'ks.idKelask', '=', 'k.idKelas')->
        join('prestasi_siswas as p', 's.id', '=', 'p.id_siswa')->
        join('master_jenispres as jp', 'p.idJenispresP', '=', 'jp.idJenispres')->
        join('master_kategoriprestasi as kp', 'jp.idKategoripresJP', '=', 'kp.idKategoripres')->
        join('master_tahunajaran as ta', 'ks.idTahunajarank', '=', 'ta.idTahunajaran')->
        where('k.idKelas','=',$request->idKelas)->
        orderBy('name')->
        get();
        $kelas = DB::table('master_kelas')->
        get();
        
        $ta = DB::table('master_tahunajaran as ta')->
        join('kelassiswas as ks', 'ta.idTahunajaran', '=', 'ks.idSiswak')->
        join('master_kelas as k', 'ks.idKelask', '=', 'k.idKelas')->
        where('k.idKelas','=',$request->idKelas)->
        groupBy('tahun')->
        get();
        // dd($ta);   
        set_time_limit(500);
        $pdf = PDF::loadview('kepalasekolah.laporanprestasi.cetakpdf',['pilihkelas'=>$pilihkelas, 'kelas'=>$kelas, 'ta'=>$ta]);
        return $pdf->stream();
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
        //
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
        //
    }
}
