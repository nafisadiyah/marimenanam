<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('barang')
        ->leftjoin('kategori', 'kategori.id_kategori' ,'=', 'barang.id_kategori')
        ->select('*')
        ->where('id_admin', Auth::user()->id)
        ->get();
        return view('admin.barang.view', compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang.add');
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto_barang');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move(public_path().'/foto_barang/', $nama_file);
        $name = $nama_file;  
        DB::table('barang')->insert([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'foto' => $name,
            'id_admin' => Auth::user()->id
        ]);
       
        return redirect()->action([BarangController::class, 'index']);
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
        $data = DB::table('barang')
        ->leftjoin('kategori', 'kategori.id_kategori' ,'=', 'barang.id_kategori')
        ->select('*')
        ->where('id', $id)
        ->where('id_admin', Auth::user()->id)
        ->first();
        return view('admin.barang.edit', compact('data'));
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
        if(isset($request->foto_barang)){
            $file = $request->file('foto_barang');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_barang/', $nama_file);
            $name = $nama_file;  
        }
        $last_foto = DB::table('barang')->where('id', $request->id_barang)->first();
        DB::table('barang')
              ->where('id', $request->id_barang)
              ->update([
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'id_kategori' => $request->id_kategori,
                'deskripsi' => $request->deskripsi,
                'foto' => isset($name) ? $name : $last_foto->foto
            ]);    
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('barang')->delete($id);
        return redirect()->back();
    }
}
