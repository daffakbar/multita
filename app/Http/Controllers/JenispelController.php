<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenispelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispel =DB::table('master_jenispel')->get();
        
        return view('timketertiban.masterjenispel.index', ['jenispel'=> $jenispel]);
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
        DB::table('master_jenispel')->insert([
            'jenisPelanggaran'  => $request->jenisPel,
            'poin'              => $request->poin
        ]);

        return redirect('timketertiban/masterjenispel')->with('success', 'Data Berhasil di Tambah!');
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
        $jenispeldit = DB::table('master_jenispel')->where('id', $id)->get();

        return view('timketertiban.masterjenispel.edit', ['jenispeldit'=> $jenispeldit]);
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
        DB::table('master_jenispel')->where('id', $request->id)->update([
            'jenisPelanggaran'  => $request->jenispel,
            'poin'              => $request->poin
        ]);
        return redirect('timketertiban/masterjenispel')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('master_jenispel')->where('id', $id)->delete();

        return redirect('timketertiban/masterjenispel')->with('success', 'Data Berhasil di Hapus!');
    }
}
