<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PelanggaranSiswa;
use Illuminate\Database\Eloquent\Model;


class PelanggaranController extends Controller
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
        $kategoripel = DB::table('master_jenispel as jp')
        ->join('master_kategoripelanggaran as kp','jp.idKategoripelJP','=','kp.idKategoripel')
        ->get();
        // dd($kategoripel);
        // dd($datas);
        $ajax = DB::table('master_jenispel as jp')
        // ->join('master_kategoripelanggaran as kp','jp.idKategoripelJP','=','kp.idKategoripel')
        ->groupBy('idKategoripelJP')
        // ->orderBy('idKategoripelJP', 'desc')
        ->get();

        $pelanggaran = DB::table('pelanggaran_siswas as ps')
        // ->join('kelassiswas as ks','ps.idKelassiswaP','=','ks.idKelassiswa')
        ->join('siswas as s','ps.id_siswa','=','s.id')
        ->join('master_jenispel as jp','ps.idJenispelP','=','jp.idJenispel')
        ->join('master_kategoripelanggaran as kp','jp.idKategoripelJP','=','kp.idKategoripel')
        ->get();
        // dd($pelanggaran);

        return view('timketertiban.datapelanggaran.index',compact('siswas','kategoripel','ajax','pelanggaran'))->with('ajax',$ajax); 
    }
    public function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('master_jenispel')
    //    ->join('master_kategoripelanggaran as kp','jp.idKategoripelJP','=','kp.idKategoripel')
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
        // DB::table('pelanggaran_siswas')->insert([
        //     'id_siswa' =>$request->idKelassiswaP,
        //     'idJenispelP' => $request->idJenispelP,
        //     'tanggalPelanggaran' => $request->tanggalPelanggaran
        // ]);


        $totalpel = DB::table('pelanggaran_siswas as ps')
        ->select(DB::raw('sum(jp.poin) as total_pelanggaran'))
        ->join('master_jenispel as jp','ps.idJenispelP','=','jp.idJenispel')
        ->where('id_siswa','=',$request->idKelassiswaP)
        ->get();
        $totalpeljson = json_decode($totalpel,true);
        // dd($totalpeljson);
        $totalpres = DB::table('prestasi_siswas as ps')
        ->select(DB::raw('sum(jp.poin) as total_prestasi'))
        ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        ->where('id_siswa','=',$request->idKelassiswaP)
        ->get();
        $totalpresjson = json_decode($totalpres,true);
        foreach($totalpel as $totpel){
            foreach($totalpres as $totpres){

                $total = $totpel->total_pelanggaran + $totpres->total_prestasi;
            }
        }
        if($totalpeljson >= 75){
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
        foreach ($batasawal as $sk){
            if($sk->batasAwal >= $totals or $sk->batasAkhir <= $totals){
                $peringatan = $sk->idSanksi;
            // break;
        }
        var_dump($peringatan);
    }
    // dd($peringatan);
        // dd($totals);    
        // dd($total,$totalpel,$totalpres);
        // $history = DB::table('historysiswas')
        // ->updateOrInsert(
        //     ['id_siswa'=>$request->idKelassiswaP],
        //     ['total_pelanggaran'=> $totalpeljson['total_pelanggaran']],
        //     ['total'=>$total]
        //     ['id_sangsi']
        // );
        

        // return redirect('timketertiban/pelsiswa')->with('success', 'Data Berhasil di Tambah!');
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
