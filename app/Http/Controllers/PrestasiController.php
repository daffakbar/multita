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
        ->paginate(5);

        // dd($kategoripres);
        $prestasi = DB::table('prestasi_siswas as ps')
        ->join('kelassiswas as ks','ps.idKelassiswaPres','=','ks.idKelassiswa')
        ->join('siswas as s','ks.idSiswak','=','s.id')
        ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        ->join('master_kategoriprestasi as kp','jp.idKategoripresJP','=','kp.idKategoripres')
        ->get();
        

        // document.getElementById("demo").val = "{{poin}}";

        $xxx = DB::table('prestasi_siswas as ps')
        ->select('ps.idPrestasi')
        ->join('kelassiswas as ks','ps.idKelassiswaPres','=','ks.idKelassiswa')
        ->join('siswas as s','ks.idSiswak','=','s.id')
        ->where('s.id','=','5')
        // ->join('master_jenispres as jp','ps.idJenispresP','=','jp.idJenispres')
        // ->join('master_kategoriprestasi as kp','jp.idKategoripresJP','=','kp.idKategoripres')
        ->get();
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
        $idprestasi = DB::table('prestasi_siswas')->insertGetId([
            'id' =>$request->idKelassiswapres,
            'idJenispresP' => $request->idJenispresP,
            'tanggalPrestasi' => $request->tanggalPrestasi
        ]);
        
        $idP = DB::table('historysiswas')->insert([
            'idPrestasiH' => $idprestasi
        ]);
        
        //insert&update histori
        $history = DB::table('historysiswas')
        ->updateOrInsert(
            [],
        );

        // $sanksi = DB::table('master_sanksi')
        // ->get();
        
        



        
        // $getprestasi = DB::table('prestasi_siswas as ps')
        // ->select('ps.idPrestasi')
        // ->join('kelassiswas as ks','ps.idKelassiswaPres','=','ks.idKelassiswa')
        // ->join('siswas as s','ks.idSiswak','=','s.id')
        // ->where('ps.idKelassiswaPres','=',$request->idKelassiswapres)
        // ->get();
        
        // $getP = json_encode($getprestasi);
        // // dd($getP);
        // $history = DB::table('historysiswas')->insert([
        //     'idPrestasiH' => $getP
        //     // 'idPelanggaranH' => $request->idPelanggaran,
        //     // 'idSanksiH' =>$request->idSanksi
        // ]);
         
        

        return redirect('timketertiban/pressiswa',compact('idprestasi','idP'))->with('success', 'Data Berhasil di Tambah!');
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
