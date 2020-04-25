<?php

namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class RetensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

    public function index()
    {
        $datas = Dokumen::join('status_dokumen as sd','sd.id','=','dokumens.id_statusd')
        ->join('j_lokasis as jl','jl.id','=','dokumens.id_md')
        ->join('lokasis as l','l.id','=','jl.id_lokasi')
        ->join('pokok_persoalans as pp','pp.id','=','jl.id_pp')
        ->join('anak_persoalans as ap','ap.id','=','jl.id_ap')
        ->join('perihals as p','p.id','=','jl.id_p')
        ->whereIn('id_statusd',[3,4])
        ->select('kode_pp','kode_ap','kode_p',
        'gedung','rak','baris','bok','folder',
        'dokumens.id as id_dok','nama_dokumen','tingkat_perkembangan','kurun_waktu','media_arsip',
        'sd.id','status')
        ->get();
        // dd($datas);
        return view('admin.retensi.daftarRetensi',compact('datas'));
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

    public function store(Request $request)
    {
        //
    }

    
    public function musnah()
    {
        $datas = Dokumen::where('id_statusd','=','3')->update(['id_arsip' => 2]);
        return redirect('admin/daftar-arsip');
    }

    public function daftararsip()
    {
        $datas = Dokumen::join('status_dokumen as sd','sd.id','=','dokumens.id_statusd')
        ->join('j_lokasis as jl','jl.id','=','dokumens.id_md')
        ->join('lokasis as l','l.id','=','jl.id_lokasi')
        ->join('pokok_persoalans as pp','pp.id','=','jl.id_pp')
        ->join('anak_persoalans as ap','ap.id','=','jl.id_ap')
        ->join('perihals as p','p.id','=','jl.id_p')
        ->where([['id_statusd','=',3],['id_arsip','=',2]])
        ->select('kode_pp','kode_ap','kode_p',
        'gedung','rak','baris','bok','folder',
        'dokumens.id as id_dok','nama_dokumen','tingkat_perkembangan','kurun_waktu','media_arsip',
        'sd.id','status')
        ->get();
        return view('admin.retensi.daftarArsip',compact('datas'));
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
        $datas = Dokumen::find($id);
        $datas->id_statusd = $request->status;
        $datas->save();
        return redirect()->back();
    }

    public function show($id)
    {
        $datas = Dokumen::find($id)->first();
        $decode = json_decode($datas,true);
        // dd($decode);
        $berkas = $decode['file'];
        try {

            $link = $this->dropbox->listSharedLinks('public/berkas/'.$berkas);
            $raw = explode("?", $link[0]['url']);
            $gambar = $raw[0].'?raw=1';
            $tempGambar = tempnam(sys_get_temp_dir(), $berkas);
            copy($gambar, $tempGambar);
            $file = response()->file($tempGambar);

        } catch (Exception $e) {
            return abort(404);
        }
        return view('admin.retensi.viewDokumen',compact('gambar'));
    }
}
