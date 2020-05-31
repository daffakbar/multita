<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class DashboardsiswawmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idlogin = Auth::user()->id;
        
        $totpel = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        join('pelanggaran_siswas as ps','s.id','=','ps.id_siswa')->
        where('w.id','=',$idlogin)->
        count();
        
        $totpres = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        join('prestasi_siswas as ps','s.id','=','ps.id_siswa')->
        where('w.id','=',$idlogin)->
        count();
        
        // $pelserin = DB::table('pelanggaran_siswas as ps')->
        $pelserin = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        join('pelanggaran_siswas as ps','s.id','=','ps.id_siswa')->
        select('jenisPelanggaran')->
        join('master_jenispel as jp', 'ps.idJenispelP','=','jp.idJenispel')->
        where('w.id','=',$idlogin)->
        groupBy('jenisPelanggaran')->
        max('jenisPelanggaran');
        // dd($pelserin);

        $presserin = DB::table('siswas as s')->
        join('prestasi_siswas as ps','s.id','=','ps.id_siswa')->
        join('walimurids as w','s.id','=','w.niss')->
        select('jenisPrestasi')->
        join('master_jenispres as jp', 'ps.idJenispresP','=','jp.idJenispres')->
        where('w.id','=',$idlogin)->
        groupBy('jenisPrestasi')->
        max('jenisPrestasi');
        // dd($presserin);
        

        return view('walimurid/dashboardsiswa/index', compact('totpel','totpres','pelserin','presserin'));
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
