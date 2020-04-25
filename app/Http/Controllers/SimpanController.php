<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JLokasi;
use App\Dokumen;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class SimpanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    	//Penyiapkan Client Disk Dropbox
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

    public function index()
    {
        if (session('success')){
            alert()->success('Data Berhasil Disimpan');
        }
        $kodeDokumen = JLokasi::join('lokasis as l', 'l.id','=','j_lokasis.id_lokasi')
        ->join('pokok_persoalans as pp', 'pp.id','=','j_lokasis.id_pp')
        ->join('anak_persoalans as ap', 'ap.id','=','j_lokasis.id_ap')
        ->join('perihals as p', 'p.id','=','j_lokasis.id_p')
        ->join('jras as j', 'j.id','=','j_lokasis.id_jra')
        ->select('j_lokasis.id','pp.kode_pp','ap.kode_ap','p.kode_p','j.jenis_jra')
        ->get();
        // dd($kodeDokumen);
        return view('admin.penyimpanan.formSimpan',compact('kodeDokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('success_update')){
            alert()->success('Data Berhasil Diperbarui',session('Success Update'));
        }elseif(session('success_delete')){
            alert()->success('Data Berhasil Dihapus',session('Success Delete'));
        }
        $datas = Dokumen::join('j_lokasis as jl','jl.id','=','dokumens.id_md')
        ->join('lokasis as l', 'l.id','=','jl.id_lokasi')
        ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
        ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
        ->join('perihals as p', 'p.id','=','jl.id_p')
        ->join('jras as j', 'j.id','=','jl.id_jra')
        ->join('status_dokumen as sd', 'sd.id','=','dokumens.id_statusd')
        ->select(
            'dokumens.id',
            'pp.kode_pp',
            'ap.kode_ap',
            'p.kode_p',
            'dokumens.nama_dokumen',
            'dokumens.kurun_waktu',
            'dokumens.tingkat_perkembangan',
            'dokumens.media_arsip',
            'dokumens.kondisi',
            'sd.status'
            )
        ->get();
        // dd($datas);
        return view('admin.penyimpanan.daftar',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'file' => 'required|mimes:pdf|max:10000',
        ]);
        $berkas = $data['file'];
        $namaBerkas = uniqid().'.'.$berkas->getClientOriginalExtension();
        $berkas->storeAs('/public/berkas/', $namaBerkas, 'dropbox');
        $response = $this->dropbox->createSharedLinkWithSettings('/public/berkas/'.$namaBerkas);

        $datas =  new Dokumen();
        $datas->id_md = $request->kode;
        $datas->nama_dokumen = $request->nama;
        $datas->deskripsi = $request->deskripsi;
        $datas->kurun_waktu = $request->kurunWaktu;
        $datas->tingkat_perkembangan = $request->tPerkembangan;
        $datas->media_arsip = $request->media;
        $datas->kondisi = $request->kondisi;
        $datas->file = $namaBerkas;
        $datas->id_statusd = 1;
        $datas->id_arsip = 1;
        $datas->save();

        $lokasis = JLokasi::join('lokasis as l','l.id','=','j_lokasis.id_lokasi')
        // ->join('dokumens as d','d.id_md','=','j_lokasis.id')
        ->where('j_lokasis.id','=',$request->kode)->get();
        // dd($lokasis);
        return view('admin.penyimpanan.lokasi',compact('lokasis'));
        // return redirect('admin/form-penyimpanan')->withSuccess('success', 'Task Created Successfully!');

    }

    public function show($id)
    {
        $datas = Dokumen::find($id)
        ->join('j_lokasis as jl','jl.id','=','dokumens.id_md')
        ->join('lokasis as l', 'l.id','=','jl.id_lokasi')
        ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
        ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
        ->join('perihals as p', 'p.id','=','jl.id_p')
        ->join('jras as j', 'j.id','=','jl.id_jra')
        ->select(
            'dokumens.id',
            'dokumens.nama_dokumen',
            'dokumens.deskripsi',
            'dokumens.kurun_waktu',
            'dokumens.tingkat_perkembangan',
            'dokumens.media_arsip',
            'dokumens.kondisi',
            'dokumens.file',
            'l.gedung',
            'l.rak',
            'l.baris',
            'l.bok',
            'l.folder',
            'j.jenis_jra',
            'j.aktif',
            'j.inaktif',
            'j.sifat_dokumen',
            'pp.kode_pp', 
            'pp.pokok_persoalan',
            'ap.kode_ap',
            'ap.anak_persoalan',
            'p.kode_p',
            'p.perihal'
        )
        ->get();
        // dd($datas);
        $decode = json_decode($datas,true);
        $berkas = $decode[0]['file'];
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

        return view('admin.penyimpanan.detil', compact('datas','gambar'));
    }

    public function edit($id)
    {
        $datas = Dokumen::find($id)
        ->join('j_lokasis as jl','jl.id','=','dokumens.id_md')
        ->join('lokasis as l', 'l.id','=','jl.id_lokasi')
        ->join('pokok_persoalans as pp', 'pp.id','=','jl.id_pp')
        ->join('anak_persoalans as ap', 'ap.id','=','jl.id_ap')
        ->join('perihals as p', 'p.id','=','jl.id_p')
        ->join('jras as j', 'j.id','=','jl.id_jra')
        ->select(
            'dokumens.id',
            'dokumens.nama_dokumen',
            'dokumens.deskripsi',
            'dokumens.kurun_waktu',
            'dokumens.tingkat_perkembangan',
            'dokumens.media_arsip',
            'dokumens.kondisi',
            'dokumens.file',
            'l.gedung',
            'l.rak',
            'l.baris',
            'l.bok',
            'l.folder',
            'j.jenis_jra',
            'j.aktif',
            'j.inaktif',
            'j.sifat_dokumen',
            'pp.kode_pp', 
            'pp.pokok_persoalan',
            'ap.kode_ap',
            'ap.anak_persoalan',
            'p.kode_p',
            'p.perihal'
        )
        ->get();
        // dd($datas);
        $decode = json_decode($datas,true);
        $berkas = $decode[0]['file'];
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
        return view('admin.penyimpanan.edit',compact('datas'));
    }

    public function update(Request $request, $id)
    {
        if(!empty($request->file)){
            $datas =  Dokumen::find($request->id);
            $datas->id_md = $request->kode;
            $datas->nama_dokumen = $request->nama;
            $datas->deskripsi = $request->deskripsi;
            $datas->kurun_waktu = $request->kurunWaktu;
            $datas->tingkat_perkembangan = $request->tPerkembangan;
            $datas->media_arsip = $request->media;
            $datas->kondisi = $request->kondisi;
            // $datas->file = $namaBerkas;
            $datas->save();
            return redirect('admin/daftar-dokumen')->withSuccessUpdate('success', 'Task Created Successfully!');

        }else{
            $data = request()->validate([
                'file' => 'required|mimes:pdf|max:10000',
            ]);
            $berkas = $data['file'];
            $namaBerkas = uniqid().'.'.$berkas->getClientOriginalExtension();
            $berkas->storeAs('/public/berkas/', $namaBerkas, 'dropbox');
            $response = $this->dropbox->createSharedLinkWithSettings('/public/berkas/'.$namaBerkas);

            $datas =  Dokumen::find($request->id);
            $datas->id_md = $request->kode;
            $datas->nama_dokumen = $request->nama;
            $datas->deskripsi = $request->deskripsi;
            $datas->kurun_waktu = $request->kurunWaktu;
            $datas->tingkat_perkembangan = $request->tPerkembangan;
            $datas->media_arsip = $request->media;
            $datas->kondisi = $request->kondisi;
            $datas->file = $namaBerkas;
            $datas->save();
            return redirect('admin/daftar-dokumen')->withSuccessUpdate('success', 'Task Created Successfully!');
        }
        
    }

    public function destroy($id)
    {
        $datas = Dokumen::find($id)->delete();
        return redirect('admin/daftar-dokumen')->withSuccessDelete('success', 'Task Created Successfully!');
    }

    // public function lokasi()
    // {
    //     $datas = Dokumen::find($id)->delete();
    //     return redirect('admin/daftar-dokumen')->withSuccessDelete('success', 'Task Created Successfully!');
    // }
}
