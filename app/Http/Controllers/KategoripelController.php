<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KategoripelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoripel = DB::table('master_kategoripelanggaran')->paginate(5);

        return view('bk.masterkategoripel.index', ['kategoripel' => $kategoripel]);
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
        DB::table('master_kategoripelanggaran')->insert([
            'kategoripelanggaran' =>$request->kategoripel
        ]);
        return redirect('bk/masterkategoripel')->with('success', 'Data Berhasil di Tambah!');
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
        $kategoripeledit = DB::table('master_kategoripelanggaran')->where('idKategoripel', $id)->get();

        return view('bk.masterkategoripel.edit', ['kategoripeledit' => $kategoripeledit]);
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
        DB::table('master_kategoripelanggaran')->where('idKategoripel', $request->id)->update([
            'kategoripelanggaran' => $request->kategoripel
        ]);
        
        return redirect('bk/masterkategoripel')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('master_kategoripelanggaran')->where('idKategoripel', $id)->delete();
        
        return redirect('bk/masterkategoripel')->with('success', 'Data Berhasil di Hapus!');
    }
}
