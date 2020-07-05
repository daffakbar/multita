<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walikelas = DB::table('walikelasses')->paginate(5);

        return view('bk.masterwalikelas.index',compact('walikelas'));
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
        DB::table('walikelasses')->insert([
            'namewk'    => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        return redirect('bk/masterwalikelas')->with('success', 'Data berhasil di Tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $walikelas = DB::table('walikelasses')->
        where('id',$id)->get();

        return view('bk.masterwalikelas.edit', compact('walikelas'));
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
        DB::table('walikelasses')->
        where('id', $request->id)->update([
            'namewk'=> $request->name,
            'email'=> $request->email,
        ]);
        return redirect('bk/masterwalikelas')->with('success', 'Data berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
