<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pemesanan')
        ->leftjoin('barang','barang.id', '=', 'pemesanan.id_barang')->select('pemesanan.id as id_pesanan','barang.*','pemesanan.*')->where('barang.id_admin', Auth::user()->id)->get();
        return view('admin.pemesanan.view', compact('data'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $barang =  DB::table('pemesanan')->where('id', $id)->first();

        DB::table('pemesanan')
                ->where('id', $id)
                ->update(['status' => 1]);

        DB::table('barang')
                ->where('id', $barang->id_barang)
                ->update(['id_status' => 1]);

                return redirect()->back();
    }
    public function hapus($id)
    {
        DB::table('pemesanan')
                ->where('id', $id)
                ->delete();
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
        //
    }
}
