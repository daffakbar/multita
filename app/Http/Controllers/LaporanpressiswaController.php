<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class LaporanpressiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $idlogin = Auth::user()->id;
        $datasiswa = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        join('kelassiswas as ks','s.id','=','ks.idSiswak')->
        join('master_kelas as k','k.idKelas','=','ks.idKelask')->
        where('s.id','=',$idlogin)->
        get();
        
        $datapressiswa = DB::table('siswas as s')->
        join('kelassiswas as ks','s.id','=','ks.idSiswak')->
        join('prestasi_siswas as ps','ks.idKelassiswa','=','ps.id_siswa')->
        join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')->
        join('master_kategoriprestasi as kp','kp.idKategoripres','=','jp.idKategoripresJP')->
        where('id','=',$idlogin)->
        orderBy('tanggalprestasi','desc')->
        paginate(5);
        // dd($datapressiswa);
        
        $totpres = DB::table('siswas as s')->
        select(DB::raw('SUM(poin) as totpoin'))->
        join('kelassiswas as ks','s.id','=','ks.idSiswak')->
        join('prestasi_siswas as ps','ks.idKelassiswa','=','ps.id_siswa')->
        join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')->
        where('s.id','=',$idlogin)->
        value('totpoin');

        return view('siswa/laporanprestasi/index',compact('datasiswa','datapressiswa','totpres'));
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
