<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;


class LaporanprestasiController extends Controller
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
        where('k.idKelas','=',$request->idKelas)->
        get();
        
        $kelas = DB::table('master_kelas')->
        get();
        // dd($pilihkelas);
        
        return view('timketertiban.laporanprestasi.index', compact('pilihkelas', 'kelas'));
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
