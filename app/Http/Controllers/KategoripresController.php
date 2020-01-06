<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KategoripresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoripres = DB::table('master_kategoriprestasi')->get();
        return view('bk.masterkategoripres.index', ['kategoripres'=>$kategoripres]);
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
        DB::table('master_kategoriprestasi')->insert([
            'kategoriprestasi' => $request->kategoripres
        ]);
        return redirect('bk/masterkategoripres')->with('success', 'Data Berhasil di Tambah!');
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
        $kategoripresedit = DB::table('master_kategoriprestasi')->where('id', $id)->get();

        return view('bk.masterkategoripres.edit', ['kategoripresedit' => $kategoripresedit]);
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
        DB::table('master_kategoriprestasi')->where('id', $request->id)->update([
            'kategoriprestasi'=> $request->kategoripres
        ]);

        return redirect('bk/masterkategoripres')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('master_kategoriprestasi')->where('id', $id)->delete();

        return redirect('bk/masterkategoripres')->with('success', 'Data Berhasil di Hapus!')    ;
    }
}
