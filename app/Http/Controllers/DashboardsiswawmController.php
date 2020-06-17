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
        
        $cekpel = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        // join('prestasi_siswas as ps','s.id','=','ps.id_siswa')->
        join('pelanggaran_siswas as ps','s.id','=','ps.id_siswa')->
        where('w.id','=',$idlogin)->
        get();
        
        if ($cekpel->isEmpty()) {
            $seripres = "Tidak ada";
        }else{
            $pelserin = DB::table('siswas as s')->
            join('walimurids as w','s.id','=','w.niss')->
            select('jenisPelanggaran')->
            select(DB::raw('count(*) as pelsis, jenisPelanggaran'))->
            join('pelanggaran_siswas as ps','s.id','=','ps.id_siswa')->
            join('master_jenispel as jp', 'ps.idJenispelP','=','jp.idJenispel')->
            where('w.id','=',$idlogin)->
            groupBy('jenisPelanggaran')->
            orderBy('pelsis','desc')->
            limit(1)->
            get();
            
            $seringpel = json_decode($pelserin, true);
            $seripel = $seringpel[0]['jenisPelanggaran'];
        }
        
        // dd($cekpel);
        // $pelserin = DB::table('pelanggaran_siswas as ps')->
        // dd($pelserin);
        
        $cek = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        join('prestasi_siswas as ps','s.id','=','ps.id_siswa')->
        where('w.id','=',$idlogin)->
        get();
        
        
        
        // dd($cek);
        if ($cek->isEmpty()) {
            $seripres = "Tidak ada";
        }else{
            // $seripres = "ada data"; 
            $presserin = DB::table('siswas as s')->
            join('walimurids as w','s.id','=','w.niss')->
            select('jenisPrestasi')->
            select(DB::raw('count(*) as pelsis, jenisPrestasi'))->
            join('prestasi_siswas as ps','s.id','=','ps.id_siswa')->
            join('master_jenispres as jp', 'ps.idJenispresP','=','jp.idJenispres')->
            where('w.id','=',$idlogin)->
            groupBy('jenisPrestasi')->
            orderBy('pelsis','desc')->
            limit(1)->
            get();
            $seringpres = json_decode($presserin, true);
            $seripres = $seringpres[0]['jenisPrestasi'];
        }
        
        $status = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        select('hs.id_sangsi')->
        join('historysiswas as hs','hs.id_siswa','=','s.id')->
        join('master_sanksi as ms','hs.id_sangsi','=','ms.idSanksi')->
        where('w.id','=',$idlogin)->
        get();
        
        $statss = json_decode($status, true);
        $stats = $statss[0]['id_sangsi'];
        // dd($stats);
        
        $historyp = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        join('pelanggaran_siswas as pel','pel.id_siswa','=','s.id')->
        join('master_jenispel as jpel','pel.idjenispelP','=','jpel.idJenispel')->
        join('master_kategoripelanggaran as kpel','jpel.idKategoripelJP','=','kpel.idKategoripel')->
        where('w.id','=',$idlogin)->
        orderBy('idPelanggaran','desc')->
        limit(1)->
        get();
        
        $historypp = DB::table('siswas as s')->
        join('walimurids as w','s.id','=','w.niss')->
        join('prestasi_siswas as pres','pres.id_siswa','=','s.id')->
        join('master_jenispres as jpres','pres.idjenispresP','=','jpres.idJenispres')->
        join('master_kategoriprestasi as kpres','jpres.idKategoripresJP','=','kpres.idKategoripres')->
        where('w.id','=',$idlogin)->
        orderBy('idPrestasi','desc')->
        limit(1)->
        get();

        return view('walimurid/dashboardsiswa/index', compact('totpel','totpres','pelserin','stats','historyp','historypp','seripel','seripres'));
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
