<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardTKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahsiswa = DB::table('siswas')->
        count();
        // dd($jumlahsiswa);
        $pelserin = DB::table('walimurids')->
        count();

        $totpel = DB::table('pelanggaran_siswas')->
        count();

        $totpres = DB::table('prestasi_siswas')->
        count();

        $sispel = DB::table('pelanggaran_siswas')->
        // select('id_siswa')->
        GroupBy('id_siswa')->
        get()->count();
        // dd($sispel);

        // dd($kelas);
        
        
        // dd($arraypelkelas);
        
        
        
        ////SISWA SURAT PERINGATAN
        $suratperingatan = DB::table('historysiswas as hs')->
        where('id_sangsi','>=','8')->
        join('kelassiswas as ks','hs.id_siswa','=','ks.idKelassiswa')->
        join('siswas as s','s.id','=','ks.idSiswak')->
        join('pelanggaran_siswas as ps','ps.id_siswa','=','ks.idKelassiswa')->
        join('master_kelas as k','ks.idKelask','=','k.idKelas')->
        join('master_sanksi as ms','ms.idSanksi','=','hs.id_sangsi')->
        join('walimurids as wm','s.id','=','wm.niss')->
        // join()
        // join('pelanggaran_siswas as ps','ps.id_siswa','=','s.id')->
        groupBy('name')->
        get();
        
        // dd($suratperingatan);
        
        $coba1 = DB::table('historysiswas as hs')->
        select(DB::raw('count(idSiswak)'))->
        join('siswas as s','hs.id_siswa','=','s.id')->
        join('kelassiswas as ks','s.id','=','ks.idSiswak')->
        groupBy('idKelask')->
        get();
        
        // $pelkelas = DB::table('pelanggaran_siswas as p')->
        // select(DB::raw('idKelask'))->
        // join('siswas as s', 'p.id_siswa','=','s.id')->
        // join('kelassiswas as ks','s.id','=','ks.idSiswak')->
        // join('master_kelas as k','ks.idKelask','=','k.idKelas')->
        // // wherePivot('idKelask')->
        // orderBy('idKelas','desc')->
        // limit(1)->
        // get();
        // dd($pelkelas);
        $kelas = DB::table('master_kelas as k')->
        // select(DB::raw('kelas'))->
        select(DB::raw('count(jenisPelanggaran) as jumlah, kelas'))->
         // select('jenisPelanggaran')->
         join('kelassiswas as ks','k.idKelas','=','ks.idKelask')->
         join('pelanggaran_siswas as p','p.id_siswa','=','ks.idKelassiswa')->
         join('master_jenispel as jp', 'p.idJenispelP','=','jp.idJenispel')->
        groupBy('kelas')->
        // orderBy('jumlah','desc')->
        limit(3)->
        get();
        
        $arraykelas = [];
        $arraypelkelas = [];
        
        foreach ($kelas as $k ) {
            $arraykelas[] = $k->kelas;
            // $arraypelkelas[] = $pelkelas->idKelask;
            
        }
        
        $jumpelkelas = DB::table('pelanggaran_siswas as p')->
        select(DB::raw('count(idPelanggaran) as totpel'))->
        join('kelassiswas as ks','ks.idKelassiswa','=','p.id_siswa')->
        join('siswas as s','ks.idSiswak','=','s.id')->
        join('master_kelas as k','ks.idKelask','=','k.idKelas')->
        groupBy('idKelas')->
        orderBy('idKelas','asc')->
        limit(2)->
        // orderBy('desc')->
        get();
        
        // dd($jumpelkelas);

        
        $arraypel = [];
        foreach ($jumpelkelas as $jk ) {
            $arraypel[] = $jk->totpel;
        }
        
        $jumpreskelas = DB::table('prestasi_siswas as p')->
        select(DB::raw('count(idPrestasi) as totpres'))->
        join('kelassiswas as ks','ks.idKelassiswa','=','p.id_siswa')->
        join('siswas as s','ks.idSiswak','=','s.id')->
        join('master_kelas as k','ks.idKelask','=','k.idKelas')->
        groupBy('idKelas')->
        orderBy('idKelas','asc')->
        limit(2)->
        get();
        
        $arraypres = [];
        foreach ($jumpreskelas as $jk ) {
            $arraypres[] = $jk->totpres;
        }
        // dd($jumpreskelas);
        
        // $WA = DB::table('siswas as s')->
        // join('master_sanksi as ms','hs.id_sangsi','=','ms.idSanksi')->
        // join('historysiswas as hs','s.id','=','hs.id_siswa')->
        // get();
        
         //TOP 5 Pelanggaran Terbanyak
         $pelsering = DB::table('pelanggaran_siswas as ps')->
         select(DB::raw('count(jenisPelanggaran) as jumlah, jenisPelanggaran'))->
         // select('jenisPelanggaran')->
         join('master_jenispel as jp', 'ps.idJenispelP','=','jp.idJenispel')->
         groupBy('jenisPelanggaran')->
         orderBy('jumlah','desc')->
         limit(5)->
         // value('jumlah');
         get();
        
        
        $pelsiswa = DB::table('historysiswas as hs')->
        select('s.name','hs.total')->
        join('kelassiswas as ks','ks.idKelassiswa','=','hs.id_siswa')->
        join('siswas as s', 's.id','=','ks.idSiswak')->
        // groupBy('total')->
        orderBy('total','desc')->
        limit(4)->
        get();
        // dd($pelsiswa);

        return view('timketertiban.dashboard.index', compact('jumlahsiswa','totpel', 'totpres', 'sispel','arraykelas','suratperingatan','arraypel','arraypres','pelsering','pelserin','pelsiswa'));
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
