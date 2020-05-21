<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class LaporanpelsiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idlogin = Auth::user()->id;
        $datasiswa = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        join('kelassiswas as ks','s.id','=','ks.idSiswak')->
        join('master_kelas as k','k.idKelas','=','ks.idKelask')->
        where('s.id','=',$idlogin)->
        get();

        $datapelsiswa = DB::table('siswas as s')->
        join('pelanggaran_siswas as ps','s.id','=','ps.id_siswa')->
        join('master_jenispel as jp','ps.idJenispelP','=','jp.idJenispel')->
        join('master_kategoripelanggaran as kp','kp.idKategoripel','=','jp.idKategoripelJP')->
        where('id','=',$idlogin)->
        orderBy('tanggalpelanggaran','desc')->
        paginate(5);
        
        $totpel = DB::table('siswas as s')->
        select(DB::raw('SUM(poin) as totpoin'))->
        join('pelanggaran_siswas as ps','s.id','=','ps.id_siswa')->
        join('master_jenispel as jp','ps.idJenispelP','=','jp.idJenispel')->
        where('s.id','=',$idlogin)->
        value('totpoin');

        // dd($totpel);
        return view('siswa/laporanpelanggaran/index',compact('datasiswa','datapelsiswa','totpel'));
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
