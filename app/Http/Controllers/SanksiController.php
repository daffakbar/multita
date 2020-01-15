<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanksi =DB::table('master_sanksi')->get();
        
        return view('timketertiban.mastersanksi.index', ['sanksi'=> $sanksi]);
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
        DB::table('master_sanksi')->insert([
            'sanksi' =>$request->sanksi,
            'batasAwal' => $request->batasAwal,
            'batasAkhir' => $request->batasAkhir
        ]);
        

        return redirect('timketertiban/mastersanksi')->with('success', 'Data Berhasil di Tambah!');
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
        $sanksiedit = DB::table('master_sanksi')->where('idSanksi', $id)->get();

        return view('timketertiban.mastersanksi.edit', ['sanksiedit' => $sanksiedit]);
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
        DB::table('master_sanksi')->where('idSanksi', $request->id)->update([
            'sanksi' => $request->sanksi,
            'batasAwal' => $request->batasAwal,
            'batasAkhir' => $request->batasAkhir
        ]);

        return redirect('timketertiban/mastersanksi')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('master_sanksi')->where('idSanksi', $id)->delete();

        return redirect('timketertiban/mastersanksi')->with('success', 'Data Berhasil di Hapus!');
    }
}
