<?php

namespace App\Http\Controllers;

use App\JLokasi;
use App\Lokasi;
use App\Peminjaman;
use App\User;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.pengembalian.pengembalian');
    }

    public function cari(Request $request)
    {
        $getid = User::where('nip','=',$request->cari)->get();
        $peminjaman = Peminjaman::join('users as u','u.id','=','peminjamen.id_user')
        ->join('dokumens as d','d.id','=','peminjamen.id_dokumen')
        ->join('j_lokasis as jl','jl.id','=','d.id_md')
        ->join('lokasis as l','l.id','=','jl.id_lokasi')
        ->where('id_user','=',$getid[0]['id'])
        ->where('id_status','=','1')->get();
        return view('admin.pengembalian.hasilPengembalian',compact('peminjaman'));
    }

    public function create()
    {
        $datas = Peminjaman::join('users as u','u.id','=','peminjamen.id_user')
        ->join('dokumens as d','d.id','=','peminjamen.id_dokumen')
        ->join('j_lokasis as jl','jl.id','=','d.id_md')
        ->join('lokasis as l','l.id','=','jl.id_lokasi')
        ->where('id_status','=','2')->get();
        return view('admin.pengembalian.daftar',compact('datas'));
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

    public function update(Request $request)
    {
        $datas = Peminjaman::find($request->id);
        $datas->id_status = 2;
        $datas->save();
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
