<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\JLokasi;
use App\Lokasi;
use App\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CariDokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        $kodes = JLokasi::join('lokasis as l', 'l.id','=','j_lokasis.id_lokasi')
        ->join('pokok_persoalans as pp', 'pp.id','=','j_lokasis.id_pp')
        ->join('anak_persoalans as ap', 'ap.id','=','j_lokasis.id_ap')
        ->join('perihals as p', 'p.id','=','j_lokasis.id_p')
        ->join('jras as j', 'j.id','=','j_lokasis.id_jra')
        ->select('j_lokasis.id','pp.kode_pp','ap.kode_ap','p.kode_p','j.jenis_jra')
        ->get();
        // dd($kodes);
        return view('admin.cariDokumen.cari',compact('kodes'));
    }

    public function cari(Request $request)
    {
        $kodedokumen = $request->kode;
        // dd($kodedokumen);
        
        $nama = $request->surat;
       
        $tahun = $request->tahun;
        if(!empty($kodedokumen) and !empty($nama) and !empty($tahun)){
            $kode = explode('.',$kodedokumen);
            $pp = $kode[0];
            $ap = $kode[1];
            $p = $kode[2];

            $datas = DB::table('dokumens as d')
            ->join('j_lokasis as jl','jl.id','=','d.id_md')
            ->join('lokasis as l','l.id','=','jl.id_jra')
            ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
            ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
            ->join('perihals as p', 'p.id','=','jl.id_p')
            ->where(function($query) use ($pp,$ap,$p){
                $query->where([
                    ['kode_pp','=',$pp],
                    ['kode_ap','=',$ap],
                    ['kode_p','=',$p]
                    ]);
                
            })
            ->where('nama_dokumen','like','%'.$nama.'%')
            ->whereYear('kurun_waktu', $tahun)
            ->get();
        }elseif(!empty($kodedokumen) and empty($nama) and empty($tahun)){
            $kode = explode('.',$kodedokumen);
            $pp = $kode[0];
            $ap = $kode[1];
            $p = $kode[2];

            $datas = DB::table('dokumens as d')
            ->join('j_lokasis as jl','jl.id','=','d.id_md')
            ->join('lokasis as l','l.id','=','jl.id_jra')
            ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
            ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
            ->join('perihals as p', 'p.id','=','jl.id_p')
            ->where(function($query) use ($pp,$ap,$p){
                $query->where([
                    ['kode_pp','=',$pp],
                    ['kode_ap','=',$ap],
                    ['kode_p','=',$p]
                    ]);
                
            })
            ->get();
        }elseif(empty($kodedokumen) and !empty($nama) and empty($tahun)){
            
            $datas = DB::table('dokumens as d')
            ->join('j_lokasis as jl','jl.id','=','d.id_md')
            ->join('lokasis as l','l.id','=','jl.id_jra')
            ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
            ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
            ->join('perihals as p', 'p.id','=','jl.id_p')
            ->where('nama_dokumen','like','%'.$nama.'%')
            ->get();
        }elseif(empty($kodedokumen) and empty($nama) and !empty($tahun)){

            $datas = DB::table('dokumens as d')
            ->join('j_lokasis as jl','jl.id','=','d.id_md')
            ->join('lokasis as l','l.id','=','jl.id_jra')
            ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
            ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
            ->join('perihals as p', 'p.id','=','jl.id_p')
            
            ->whereYear('kurun_waktu', $tahun)
            ->get();
        }elseif(!empty($kodedokumen) and !empty($nama) and empty($tahun)){
            $kode = explode('.',$kodedokumen);
            $pp = $kode[0];
            $ap = $kode[1];
            $p = $kode[2];

            $datas = DB::table('dokumens as d')
            ->join('j_lokasis as jl','jl.id','=','d.id_md')
            ->join('lokasis as l','l.id','=','jl.id_jra')
            ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
            ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
            ->join('perihals as p', 'p.id','=','jl.id_p')
            ->where(function($query) use ($pp,$ap,$p){
                $query->where([
                    ['kode_pp','=',$pp],
                    ['kode_ap','=',$ap],
                    ['kode_p','=',$p]
                    ]);
                
            })
            ->where('nama_dokumen','like','%'.$nama.'%')
            ->get();

        }elseif(!empty($kodedokumen) and empty($nama) and !empty($tahun)){
            $kode = explode('.',$kodedokumen);
            $pp = $kode[0];
            $ap = $kode[1];
            $p = $kode[2];

            $datas = DB::table('dokumens as d')
            ->join('j_lokasis as jl','jl.id','=','d.id_md')
            ->join('lokasis as l','l.id','=','jl.id_jra')
            ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
            ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
            ->join('perihals as p', 'p.id','=','jl.id_p')
            ->where(function($query) use ($pp,$ap,$p){
                $query->where([
                    ['kode_pp','=',$pp],
                    ['kode_ap','=',$ap],
                    ['kode_p','=',$p]
                    ]);
                
            })
            ->whereYear('kurun_waktu', $tahun)
            ->get();
        }elseif(empty($kodedokumen) and !empty($nama) and !empty($tahun)){

            $datas = DB::table('dokumens as d')
            ->join('j_lokasis as jl','jl.id','=','d.id_md')
            ->join('lokasis as l','l.id','=','jl.id_jra')
            ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
            ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
            ->join('perihals as p', 'p.id','=','jl.id_p')
            ->where('nama_dokumen','like','%'.$nama.'%')
            ->whereYear('kurun_waktu', $tahun)
            ->get();
        }
        
        $kodes = JLokasi::join('lokasis as l', 'l.id','=','j_lokasis.id_lokasi')
        ->join('pokok_persoalans as pp', 'pp.id','=','j_lokasis.id_pp')
        ->join('anak_persoalans as ap', 'ap.id','=','j_lokasis.id_ap')
        ->join('perihals as p', 'p.id','=','j_lokasis.id_p')
        ->join('jras as j', 'j.id','=','j_lokasis.id_jra')
        ->select('j_lokasis.id','pp.kode_pp','ap.kode_ap','p.kode_p','j.jenis_jra')
        ->get();
        return view('admin.cariDokumen.hasil',compact('datas','kodes'));
    }
    
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
    public function update(Request $request, $id)
    {
        //
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
