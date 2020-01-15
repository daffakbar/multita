<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Imports\SiswaImport;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use Alert;

class BkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Siswa::all();
        
        //mengambil data
        $siswa =DB::table('siswas')->paginate(5);
        //mengirim data ke view
        return view('bk.mastersiswa.index', ['siswa'=>$siswa]);
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
        return Siswa::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Siswa::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswaedit = DB::table('siswas')->where('nis', $id)->get();

        return view('bk.mastersiswa.edit', ['siswaedit' => $siswaedit]);
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
        DB::table('siswas')->where('nis', $request->id)->update([
            // 'nis' => $request->nis,
            'namaSiswa' => $request->namaSiswa,
            'jenisKelamin' => $request->jenisKelamin,
            'agama' => $request->agama,
            'password' => $request->password
        ]);

        return redirect('bk/mastersiswa')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('siswas')->where('nis', $id)->delete();

        return redirect('bk/mastersiswa')->with('success', 'Data Berhasil di Hapus!');
    }
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
        // dd($file);
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
        
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('bk/mastersiswa')->with('success', 'Data Berhasil di Import!');
	}
}
