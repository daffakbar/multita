<?php

namespace App\Http\Controllers;
use App\Master_Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;



class KelassiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelassiswa = DB::table('kelassiswas')->
        join('siswas','kelassiswas.idSiswak','=','siswas.id')->
        join('master_kelas','kelassiswas.idKelask','=','master_kelas.idKelas')->
        join('master_tahunajaran', 'kelassiswas.idTahunajarank','=','master_tahunajaran.idTahunajaran')->
        orderBy('idKelask','desc')->
        paginate(5);

        $kelas = DB::table('master_kelas')->paginate(5);
        $siswas = DB::table('siswas')->
        // join('kelassiswas as k','s.id','=','k.idSiswak')->
        get();
        //IKIIKIKI
        // $siswas = DB::table('siswas as s')->
        // leftJoin('kelassiswas as k','s.id','=','k.idSiswak')->
        // get();
        $tahunajaran = DB::table('master_tahunajaran')->paginate(5);
        // dd($tahunajaran);
        // dd($siswas);
        // foreach($siswas as $sw){
        //     if(DB::table('kelassiswas')->where('idSiswak','=',$sw->id)->first() == null){
        //         $ss = DB::table('siswas')->where('id','=',$sw->id)->get();

        //     }else
        //     {
        //         $ss = ' ';
        //     }
        //     // $a = "<option >.$ss.</option>";
        // }
        

        return view('bk.masterkelassiswa.index',compact('kelassiswa','kelas','siswas','tahunajaran'));
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
        DB::table('kelassiswas')->insert([

            'idTahunajarank'    => $request->idTahunajarank,
            'idKelask'          => $request->idKelask,
            'idSiswak'          => $request->idSiswak,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        return redirect('bk/masterkelassiswa')->with('success', 'Data Berhasil di Tambah!');
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
        DB::table('kelassiswas')->where('idKelassiswa', $id)->delete();

        return redirect('bk/masterkelassiswa')->with('success', 'Data Berhasil di Hapus!');

    }
}
