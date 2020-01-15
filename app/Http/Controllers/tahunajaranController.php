<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tahunajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunajaran =DB::table('master_tahunajaran')->paginate(5);
        return view('bk.mastertahunajaran.index', ['tahunajaran'=>$tahunajaran]);
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
        DB::table('master_tahunajaran')->insert([
            'semester' =>$request->semester,
            'tahun'=>$request->tahun,
            'tanggalMulai'=>$request->tanggalMulai
        ]);

        return redirect('bk/mastertahunajaran')->with('success', 'Data Berhasil di Tambah!');
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
        $tahunajaranedit = DB::table('master_tahunajaran')->where('idTahunajaran', $id)->get();

        return view('bk.mastertahunajaran.edit', ['tahunajaranedit'=> $tahunajaranedit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('master_tahunajaran')->where('idTahunajaran', $request->id)->update([
            'semester' => $request->semester,
            'tahun' => $request->tahun,
            'tanggalMulai'=> $request->tanggalMulai
        ]);

        return redirect('bk/mastertahunajaran')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('master_tahunajaran')->where('idTahunajaran', $id)->delete();
        
        return redirect('bk/mastertahunajaran')->with('success', 'Data Berhasil di Hapus!');
    }
}
