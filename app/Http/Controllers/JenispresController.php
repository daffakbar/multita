<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenispresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispres =DB::table('master_jenispres')->
        join('master_kategoriprestasi','masterjenispres.idKategoripres','=','master_kategoriprestasi.id')->
        orderBy('idKategoripres','desc')->
        get();
        
        return view('timketertiban.masterjenispres.index',compact('jenispres'));
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
        DB::table('master_jenispres')->insert([
            'idKategoripres'    => $request->idKategoripres,
            'jenisPrestasi'     => $request->jenisPres,
            'poin'              => $request->poin,
            'created_at'        =>now(),
            'updated_at'        =>now()
        ]);

        return redirect('timketertiban/masterjenispres')->with('success', 'Data Berhasil di Tambah!');
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
        $jenispresedit = DB::table('master_jenispres')->where('id', $id)->get();

        return view('timketertiban.masterjenispres.edit', ['jenispresedit'=>$jenispresedit]);
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
        DB::table('master_jenispres')->where('id', $request->id)->update([
            'jenisPrestasi'  => $request->jenispres,
            'poin'              => $request->poin
        ]);
        return redirect('timketertiban/masterjenispres')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('master_jenispres')->where('id', $id)->delete();

        return redirect('timketertiban/masterjenispres')->with('success', 'Data Berhasil di Hapus!');
    }
}
