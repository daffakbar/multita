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
        $jenispres =DB::table('master_jenispres as jp')->
        join('master_kategoriprestasi as kp','jp.idKategoripresJP','=','kp.idKategoripres')->
        orderBy('kp.idKategoripres','desc')->
        get();
        // dd($jenispres);
        $kategoripres = DB::table('master_kategoriprestasi')->get();
        // dd($jenispres);

        return view('timketertiban.masterjenispres.index',compact('jenispres','kategoripres'));
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
            'idKategoripresJP'    => $request->idKategoripres,
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
        $jenispresedit = DB::table('master_jenispres')->where('idJenispres', $id)->get();

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
        DB::table('master_jenispres')->where('idJenispres', $id)->delete();

        return redirect('timketertiban/masterjenispres')->with('success', 'Data Berhasil di Hapus!');
    }
}
