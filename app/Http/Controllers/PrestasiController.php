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
        ->get();
        // dd($siswas);
        $kategoripres = DB::table('master_jenispres as jp')
        ->join('master_kategoriprestasi as kp','jp.idKategoripresJP','=','kp.idKategoripres')
        ->get();

        // dd($kategoripres);
        $prestasi = DB::table('prestasi_siswas as ps')
        // ->join('kelassiswas as ks','ps.idKelassiswaPres','=','ks.idKelassiswa')
        ->join('siswas as s','ps.id_siswa','=','s.id')
        ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        ->join('master_kategoriprestasi as kp','jp.idKategoripresJP','=','kp.idKategoripres')
        ->get();
        

        // document.getElementById("demo").val = "{{poin}}";

        // $xxx = DB::table('prestasi_siswas as ps')
        // ->select('ps.idPrestasi')
        // ->join('kelassiswas as ks','ps.idKelassiswaPres','=','ks.idKelassiswa')
        // ->join('siswas as s','ks.idSiswak','=','s.id')
        // ->where('s.id','=','5')
        // ->get();
        // ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        // ->join('master_kategoriprestasi as kp','jp.idKategoripresJP','=','kp.idKategoripres')
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
        DB::table('prestasi_siswas')->insert([
            'id_siswa' =>$request->idKelassiswapres,
            'idJenispresP' => $request->idJenispresP,
            'tanggalPrestasi' => $request->tanggalPrestasi
        ]);
        


        $totalpres = DB::table('prestasi_siswas as ps')
        ->select(DB::raw('sum(jp.poin) as total_prestasi'))
        ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        ->where('id_siswa','=',$request->idKelassiswapres)
        ->get();
        $totalpresjson = json_decode($totalpres,true);
        
        //////////////////////////
        $totalpel = DB::table('pelanggaran_siswas as ps')
        ->select(DB::raw('sum(jp.poin) as total_pelanggaran'))
        ->join('master_jenispel as jp','ps.idJenispelP','=','jp.idJenispel')
        ->where('id_siswa','=',$request->idKelassiswapres)
        ->get();
        // dd($totalpel);
        $totalpeljson = json_decode($totalpel,true);
        // dd($totalpeljson);
        

        
        
        foreach($totalpel as $totpel){
            foreach($totalpres as $totpres){

                $total = $totpel->total_pelanggaran + $totpres->total_prestasi;
            }
        }


        if($totalpeljson >= 75){
            $totals = $totalpeljson[0]['total_pelanggaran'] - $totalpresjson[0]['total_prestasi'];
            
        }else{
            $totals = $totalpeljson[0]['total_pelanggaran'];
            // $totalprestasii = $totalpresjson[0]['total_prestasi'];

        }
        // dd($totalpresjson);
        $batasawal = DB::table('master_sanksi')
        // ->select('batasAwal','batasAkhir')
        ->get();

        if( null <= $totals AND '9' >= $totals){
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=','13')
            ->get();
            $per = json_decode($peringatan,true);
        }
        elseif('10' <= $totals AND '35' >= $totals){
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=','6')
            ->get();
            $per = json_decode($peringatan,true);
        }elseif('36' <= $totals AND '55' >= $totals){
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=', '7')
            ->get();
            $per = json_decode($peringatan,true);
        }elseif ('56' <= $totals AND '75' >= $totals) {
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=', '8')
            ->get();
            $per = json_decode($peringatan,true);
        }elseif ('76' <= $totals AND '95' >= $totals) {
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=', '9')
            ->get();
            $per = json_decode($peringatan,true);
        }elseif ('96' <= $totals AND '150' >= $totals) {
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=', '10')
            ->get();
            $per = json_decode($peringatan,true);
        }elseif ('151' <= $totals AND '249' >= $totals) {
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=', '11')
            ->get();
            $per = json_decode($peringatan,true);
        }elseif ('250' <= $totals AND '300' >= $totals) {
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=', '12')
            ->get();
            $per = json_decode($peringatan,true);
        }

        $history = DB::table('historysiswas')
        ->updateOrInsert(
            ['id_siswa'=> $request->idKelassiswapres],
            [
            'id_siswa'=> $request->idKelassiswapres,
            'total_prestasi'=> $totalpresjson[0]['total_prestasi'],
            'total_pelanggaran'=> $totalpeljson[0]['total_pelanggaran'],
            'total'=> $totals,
            'id_sangsi' => $per[0]['idSanksi']
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
