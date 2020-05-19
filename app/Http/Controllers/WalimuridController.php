<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Imports\WalmurImport;
use Session;
use Maatwebsite\Excel\Facades\Excel;

class WalimuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walimurid =DB::table('walimurids')->paginate(5);
        return view('bk.masterwalimurid.index', ['walimurid'=>$walimurid]);
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
        //
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
        $walmuredit = DB::table('walimurids')->where('id', $id)->get();

        return view('bk.masterwalimurid.edit', ['walmuredit'=>$walmuredit]);
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
        DB::table('walimurids')->where('id', $request->id)->update([
            'namewm' => $request->namaWalimurid,
            'alamat'=>$request->alamat,
            'noHp'=>$request->noHp
        ]);

        return redirect('bk/masterwalmur')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('walimurids')->where('id', $id)->delete();

        return redirect('bk/masterwalmur')->with('success', 'Data Berhasil di Hapus!');
    }
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new WalmurImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('bk/masterwalmur')->with('success', 'Data Berhasil di Import!');
	}
}
