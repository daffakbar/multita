<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PelanggaranSiswa;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use Alert;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        date_default_timezone_set('Asia/Jakarta');
        $now = new DateTime();
        $a = $now->format('Y-m-d H:i:s');
        // dd($a);


        $siswas = DB::table('kelassiswas as ks')
        ->join('siswas as s','ks.idSiswak','=','s.id')
        ->get();
        // dd($siswas);
        $kategoripel = DB::table('master_jenispel as jp')
        ->join('master_kategoripelanggaran as kp','jp.idKategoripelJP','=','kp.idKategoripel')
        ->get();
        // dd($kategoripel);
        // dd($datas);
        $ajax = DB::table('master_kategoripelanggaran as jp')
        // ->select('kategoripelanggaran','idKategoripel','poin')
        ->join('master_jenispel as kp','kp.idKategoripelJP','=','jp.idKategoripel')
        // ->groupBy('idKategoripel')
        // ->orderBy('idKategoripelJP', 'desc')
        ->pluck('kategoripelanggaran','idKategoripel')->all();
        // ->get()
        // $ajax->all();
        $poin = DB::table('master_jenispel')
        // ->select('kategoripelanggaran','idKategoripel','poin')
        // ->join('master_jenispel as kp','kp.idKategoripelJP','=','jp.idKategoripel')
        ->pluck('poin','idJenispel')->all();
        // ->get();
        // dd($poin);
        
        $pelanggaran = DB::table('pelanggaran_siswas as ps')
        // ->join('kelassiswas as ks','ps.idKelassiswaP','=','ks.idKelassiswa')
        ->join('siswas as s','ps.id_siswa','=','s.id')
        ->join('master_jenispel as jp','ps.idJenispelP','=','jp.idJenispel')
        ->join('master_kategoripelanggaran as kp','jp.idKategoripelJP','=','kp.idKategoripel')
        ->orderBy('idPelanggaran','desc')
        ->paginate(6);
        // dd($pelanggaran);
        
        return view('timketertiban.datapelanggaran.index',compact('siswas','kategoripel','ajax','pelanggaran','poin','a'))->with('ajax',$ajax); 
    }
    public function btuk($id){

        $ajax = DB::table('master_jenispel as jp')
        // -select('jenisPelanggaran','idJenispel')
        // ->join('master_kategoripelanggaran as kp','jp.idKategoripelJP','=','kp.idKategoripel')
        ->where('jp.idKategoripelJP','=',$id)
        // ->groupBy('idKategoripel')
        // ->orderBy('idKategoripelJP', 'desc')
        ->pluck('jenisPelanggaran','idJenispel');
        // dd($ajax);
        return json_encode($ajax);
    }
    public function poin($id){
        $poin = DB::table('master_jenispel')->
        where('idJenispel','=',$id)->
        pluck('poin','idJenispel');
        // dd($poin);
        return json_encode($poin);
    }
    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('master_jenispel as jp')
        ->join('master_kategoripelanggaran as kp','jp.idKategoripelJP','=','kp.idKategoripel')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
         $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $datas = new PelanggaranSiswa;
        $datas->idHistorysiswa = $request->namaSiswa;
        $datas->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('pelanggaran_siswas')->insert([
            'id_siswa' =>$request->idKelassiswaP,
            'idJenispelP' => $request->idJenispelP,
            'tanggalPelanggaran' => $request->tanggalPelanggaran,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);


        $totalpel = DB::table('pelanggaran_siswas as ps')
        ->select(DB::raw('sum(jp.poin) as total_pelanggaran'))
        ->join('master_jenispel as jp','ps.idJenispelP','=','jp.idJenispel')
        ->where('id_siswa','=',$request->idKelassiswaP)
        ->get();
        // dd($totalpel);
        $totalpeljson = json_decode($totalpel,true);
        // dd($totalpeljson);
        

        $totalpres = DB::table('prestasi_siswas as ps')
        ->select(DB::raw('sum(jp.poin) as total_prestasi'))
        ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        ->where('id_siswa','=',$request->idKelassiswaP)
        ->get();
        $totalpresjson = json_decode($totalpres,true);
        // dd($totalpeljson);
        // dd($totalpeljson[0]['total_pelanggaran']);
        if($totalpeljson[0]['total_pelanggaran'] >= 75){
            $totals = $totalpeljson[0]['total_pelanggaran'] - $totalpresjson[0]['total_prestasi'];
            
        }else{
            $totals = $totalpeljson[0]['total_pelanggaran'];
        }
        // dd($totals);
        


        $batasawal = DB::table('master_sanksi')
        // ->select('batasAwal','batasAkhir')
        ->get();

        // dd($totals);
        // dd($batasawal);
        // dd($batasawal);
        // $peringatan = 'aaa';

        //KODE YG BENARR!!
        //     foreach ($batasawal as $sk){
        //         if($sk->batasAwal <= $totals AND $sk->batasAkhir >= $totals){
        //             $peringatan = $sk->idSanksi;
        //         // break;
        //     }
        //     dd($peringatan);
        // }

        //KODE DARURAT!!!
        if( null <= $totals AND '9' >= $totals){
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=','1')
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

        // dd($peringatan);

        // dd($peringatan);
        // dd($total,$totalpel,$totalpres);
        $history = DB::table('historysiswas')
        ->updateOrInsert(
            ['id_siswa'=> $request->idKelassiswaP],
            [
            'id_siswa'=> $request->idKelassiswaP,
            'total_pelanggaran'=> $totalpeljson[0]['total_pelanggaran'],
            'total_prestasi'=> $totalpresjson[0]['total_prestasi'],
            'total'=> $totals,
            'id_sangsi' => $per[0]['idSanksi']
            ]

            // ['total_pelanggaran'=> $totalpeljson[0]['total_pelanggaran']],
            // ['total_prestasi'=> $totalpresjson[0]['total_prestasi']],
            // ['total'=> $totals],
            // ['id_sangsi' => $peringatan]
            );
        // dd($history);
        // dd($history);

        return redirect('timketertiban/pelsiswa')->with('success', 'Data Berhasil di Tambah!');
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
    public function destroy($id, Request $request)
    {
        
        
        //GET ID SISWA
        $getidsiswa = DB::table('siswas as s')
        ->select('s.id')
        ->join('pelanggaran_siswas as ps','s.id','=','ps.id_siswa')
        ->where('idPelanggaran','=',$id)
        ->get();
        
        $idsiswas = json_decode($getidsiswa,true);
        $getsiswaid = $idsiswas[0]['id'];
        // dd($getsiswaid);
        // dd($totalpel);
        DB::table('pelanggaran_siswas')->where('idPelanggaran', $id)->delete();
        
        
        $totalpel = DB::table('pelanggaran_siswas as ps')
        ->select(DB::raw('sum(jp.poin) as total_pelanggaran'))
        ->join('master_jenispel as jp','ps.idJenispelP','=','jp.idJenispel')
        ->where('id_siswa','=',$getsiswaid)
        ->get();
        $totalpeljson = json_decode($totalpel,true);
        // dd($totalpeljson);
        
        
        $totalpres = DB::table('prestasi_siswas as ps')
        ->select(DB::raw('sum(jp.poin) as total_prestasi'))
        ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        ->where('id_siswa','=', $getsiswaid)
        ->get();
        $totalpresjson = json_decode($totalpres,true);
        
        
        if($totalpeljson[0]['total_pelanggaran'] >= 75){
            $totals = $totalpeljson[0]['total_pelanggaran'] - $totalpresjson[0]['total_prestasi'];
            
        }else{
            $totals = $totalpeljson[0]['total_pelanggaran'];
        }

        // dd($totals);
        $batasawal = DB::table('master_sanksi')
        // ->select('batasAwal','batasAkhir')
        ->get();
        
        // dd($batasawal);
        // dd($batasawal);
        // $peringatan = 'aaa';
        // dd($totals);
        //KODE YG BENARR!!
        //     foreach ($batasawal as $sk){
            //         if($sk->batasAwal <= $totals AND $sk->batasAkhir >= $totals){
                //             $peringatan = $sk->idSanksi;
                //         // break;
                //     }
                //     dd($peringatan);
                // }
                
        //KODE DARURAT!!!
        if( null <= $totals AND '9' >= $totals){
            $peringatan = DB::table('master_sanksi')
            ->select('idSanksi')
            ->where('idSanksi','=','1')
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
        
        // dd($peringatan);
        // dd($per);
        // dd($totalpeljson);
        // dd($total,$totalpel,$totalpres);
        $history = DB::table('historysiswas')
        ->updateOrInsert(
            ['id_siswa'=> $getsiswaid],
            [
                'id_siswa'=> $getsiswaid,
                'total_pelanggaran'=> $totalpeljson[0]['total_pelanggaran'],
                'total_prestasi'=> $totalpresjson[0]['total_prestasi'],
                'total'=> $totals,
                'id_sangsi' => $per[0]['idSanksi']
                ]
                
                // ['total_pelanggaran'=> $totalpeljson[0]['total_pelanggaran']],
                // ['total_prestasi'=> $totalpresjson[0]['total_prestasi']],
                // ['total'=> $totals],
                // ['id_sangsi' => $peringatan]
            );
            
            return redirect('timketertiban/pelsiswa')->with('success', 'Data berhasil di hapus');
    }
}
