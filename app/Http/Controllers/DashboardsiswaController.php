<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Pagination\Paginator;

class DashboardsiswaController extends Controller
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
        join('pelanggaran_siswas as ps','s.id','=','ps.id_siswa')->
        where('s.id','=',$idlogin)->
        count();
        
        $totpres = DB::table('siswas as s')->
        join('prestasi_siswas as ps','s.id','=','ps.id_siswa')->
        where('s.id','=',$idlogin)->
        count();
        
        // $pelserin = DB::table('pelanggaran_siswas as ps')->
        $pelserin = DB::table('siswas as s')->
        join('pelanggaran_siswas as ps','s.id','=','ps.id_siswa')->
        select('jenisPelanggaran')->
        join('master_jenispel as jp', 'ps.idJenispelP','=','jp.idJenispel')->
        where('s.id','=',$idlogin)->
        groupBy('jenisPelanggaran')->
        max('jenisPelanggaran');
        // dd($pelserin);

        $presserin = DB::table('siswas as s')->
        join('prestasi_siswas as ps','s.id','=','ps.id_siswa')->
        select('jenisPrestasi')->
        join('master_jenispres as jp', 'ps.idJenispresP','=','jp.idJenispres')->
        where('s.id','=',$idlogin)->
        groupBy('jenisPrestasi')->
        max('jenisPrestasi');
        // dd($presserin);

        $status = DB::table('siswas as s')->
        select('hs.id_sangsi')->
        join('historysiswas as hs','hs.id_siswa','=','s.id')->
        join('master_sanksi as ms','hs.id_sangsi','=','ms.idSanksi')->
        where('s.id','=',$idlogin)->
        get();

        $statss = json_decode($status, true);
        $stats = $statss[0]['id_sangsi'];
        // dd($stats);
        
        $historyp = DB::table('siswas as s')->
        join('pelanggaran_siswas as pel','pel.id_siswa','=','s.id')->
        join('master_jenispel as jpel','pel.idjenispelP','=','jpel.idJenispel')->
        join('master_kategoripelanggaran as kpel','jpel.idKategoripelJP','=','kpel.idKategoripel')->
        where('s.id','=',$idlogin)->
        orderBy('idPelanggaran','desc')->
        limit(1)->
        get();

        $historypp = DB::table('siswas as s')->
        join('prestasi_siswas as pres','pres.id_siswa','=','s.id')->
        join('master_jenispres as jpres','pres.idjenispresP','=','jpres.idJenispres')->
        join('master_kategoriprestasi as kpres','jpres.idKategoripresJP','=','kpres.idKategoripres')->
        where('s.id','=',$idlogin)->
        orderBy('idPrestasi','desc')->
        limit(1)->
        get();

        return view('siswa/dashboardsiswa/index', compact('totpel','totpres','pelserin','presserin','stats','historyp','historypp'));
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
