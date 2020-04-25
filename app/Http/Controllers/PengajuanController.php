<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\Peminjaman;
use Illuminate\Http\Request;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PengajuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

    public function index()
    {
        $dokumens = Dokumen::all();
        $date = date('Y-m-d');
        return view('karyawan.peminjaman',compact('date','dokumens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Peminjaman::join('dokumens as d','d.id','=','peminjamen.id_dokumen')
        ->where('id_status','=','3')
        ->orWhere('id_status','=','4')
        ->orWhere('id_status','=','5')
        ->get();
        return view('karyawan.daftar',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dokumen = $request->dokumen;
        for($count = 0; $count < count($dokumen); $count++){
            $data = array(
                'id_user' => $request->idUser,
                'id_dokumen' => $dokumen[$count],
                'diskripsi' => $request->deskripsi,
                'tgl_pinjam' => $request->wPinjam,
                // 'bulan' => $bln,
                // 'tahun' => $tahun,
                'tgl_kembali' => $request->wKembali,
                'id_status' => 3
            );
            Peminjaman::insert($data);
        }
        return redirect('https://wa.me/'.$request->nomer.'?text=test connet app to WhatsApp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Peminjaman::join('dokumens as d','d.id','=','peminjamen.id_dokumen')
        ->where('Peminjamen.id','=',$id)
        ->get();
        $berkas = $datas[0]['file'];
        // dd($berkas);
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
        return view('karyawan.dokumen',compact('gambar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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

    public function pengajuan()
    {
        $datas = Peminjaman::join('dokumens as d','d.id','=','peminjamen.id_dokumen')
        ->join('users as u','u.id','=','peminjamen.id_user')
        ->select('peminjamen.id','nip','name','nama_dokumen','diskripsi','tgl_pinjam','tgl_kembali')
        ->where('id_status','=','3')
        ->get();
        // dd($datas);
        return view('admin.permohonan.daftarpermohonan',compact('datas'));
    }

    public function tolak(Request $request)
    {
        $data = Peminjaman::find($request->id);
        $data->id_status = 4;
        $data->save();
        return redirect()->back();
    }
    public function terima(Request $request)
    {
        $data = Peminjaman::find($request->id);
        $data->id_status = 5;
        $data->save();
        return redirect()->back();
    }
}
