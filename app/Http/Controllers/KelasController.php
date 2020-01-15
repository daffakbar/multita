<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data
        $kelas =DB::table('master_kelas')->paginate(5);

        
        // alert()->success('You have been logged out.', 'Good bye!');
        // Alert::error('pesan yang ingin disampaikan', 'Judul Pesan');
        return view('bk.masterkelas.index', ['kelas'=> $kelas]);
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
        DB::table('master_kelas')->insert([
            'kelas' =>$request->kelas
        ]);
        

        return redirect('bk/masterkelas')->with('success', 'Data Berhasil di Tambah!');
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
        $kelasedit = DB::table('master_kelas')->where('idKelas', $id)->get();

        return view('bk.masterkelas.edit', ['kelasedit' => $kelasedit]);
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
        DB::table('master_kelas')->where('idKelas', $request->id)->update([
            'kelas' => $request->kelas
        ]);
        
        return redirect('bk/masterkelas')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('master_kelas')->where('idKelas', $id)->delete();
        // Alert::success('Berhasil menghapus data !')->persistent('Confirm');
        return redirect('bk/masterkelas')->with('success', 'Data Berhasil di Hapus!');
    }
}
