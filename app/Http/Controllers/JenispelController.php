<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;


class JenispelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispel = DB::table('master_jenispel')->
        join('master_kategoripelanggaran','master_jenispel.idKategoripelJP','=','master_kategoripelanggaran.idKategoripel')->
        orderBy('kategoripelanggaran','desc')->
        paginate(5);
        $kategoripel = DB::table('master_kategoripelanggaran')->paginate(5);
        
        return view('timketertiban.masterjenispel.index',compact('jenispel','kategoripel'));
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
            'idKategoripelJP'     => $request->idKategori,
            'jenisPelanggaran'  => $request->jenisPel,
            'poin'              => $request->poin,
            'created_at'        => now(),
            'updated_at'        => now()
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
        $jenispeledit = DB::table('master_jenispel')->    
        where('idJenispel', $id)->get();
        $kategoripeledit = DB::table('master_kategoripelanggaran')->get();
        // dd($jenispeledit);
        return view('timketertiban.masterjenispel.edit', compact('jenispeledit','kategoripeledit'));
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
        DB::table('master_jenispel')->where('idJenispel', $id)->delete();

        return redirect('timketertiban/masterjenispel')->with('success', 'Data Berhasil di Hapus!');
    }
}
