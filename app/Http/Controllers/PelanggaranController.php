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
        ->join('kelassiswas as ks','ps.idKelassiswaP','=','ks.idKelassiswa')
        ->join('siswas as s','ks.idSiswak','=','s.id')
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
        DB::table('pelanggaran_siswas')->insert([
            'idKelassiswaP' =>$request->idKelassiswaP,
            'idJenispelP' => $request->idJenispelP,
            'tanggalPelanggaran' => $request->tanggalPelanggaran
        ]);
        

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
    public function destroy($id)
    {
        //
    }
}
