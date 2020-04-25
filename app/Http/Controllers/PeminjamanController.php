<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\Peminjaman;
use App\User;
use Illuminate\Http\Request;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    	//Penyiapkan Client Disk Dropbox
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

    public function index()
    {
        $karyawans = User::where('is_admin','=','0')->get();
        $date = date('Y-m-d');
        $dokumens = Dokumen::all();
        // dd($karyawans);
        return view('admin.peminjaman.formPeminjaman',compact('karyawans','date','dokumens'));
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
        $dokumen = $request->dokumen;
        for($count = 0; $count < count($dokumen); $count++){
            $data = array(
                'id_user' => $request->nip,
                'id_dokumen' => $dokumen[$count],
                'diskripsi' => $request->deskripsi,
                'tgl_pinjam' => $request->wPinjam,
                // 'bulan' => $bln,
                // 'tahun' => $tahun,
                'tgl_kembali' => $request->wKembali,
                'id_status' => 1
            );
            Peminjaman::insert($data);
        }
        return redirect()->back();
    }

    public function daftar(){
        $datas = Peminjaman::join('users as u','u.id','=','peminjamen.id_user')
        ->join('dokumens as d','d.id','=','peminjamen.id_dokumen')
        ->select('peminjamen.id','u.nip','u.name','d.nama_dokumen','tgl_pinjam','tgl_kembali')
        ->get();
        return view('admin.peminjaman.daftarPeminjaman',compact('datas'));
    }

    public function show($id)
    {
        $datas = Peminjaman::join('users as u','u.id','=','peminjamen.id_user')
        ->join('dokumens as d','d.id','=','peminjamen.id_dokumen')
        ->where('peminjamen.id','=',$id)
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

        return view('admin.peminjaman.detil',compact('datas','gambar'));
        
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

    public function destroy($id)
    {
        $datas=Peminjaman::find($id)->delete();
        return redirect('admin/daftar-peminjaman');
    }

    public function notifwa($id){
        $now = date('y-m-d');
        $datas = Peminjaman::join('users as u','u.id','=','peminjamen.id_user')
        ->join('dokumens as d','d.id','=','peminjamen.id_dokumen')
        ->where('peminjamen.id','=',$id)
        ->get();
        $decode = json_decode($datas,true);
        $tlp = $decode[0]['telp'];
        // dd($tlp);
        return redirect('https://wa.me/'.$tlp);
    }
}
