<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        if (session('success')){
            alert()->success('Data Berhasil Disimpan');
        }elseif(session('success_update')){
            alert()->success('Data Berhasil Diperbarui',session('Success Update'));
        }elseif(session('success_delete')){
            alert()->success('Data Berhasil Dihapus',session('Success Delete'));
        }
        $datas = Lokasi::all();
        return view('admin.lokasiSimpan',compact('datas'));
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
        $datas = new Lokasi();
        $datas->gedung=$request->gedung;
        $datas->rak=$request->rak;
        $datas->baris=$request->baris;
        $datas->bok=$request->bok;
        $datas->folder=$request->folder;
        $datas->save();
        return redirect('admin/lokasi')->withSuccess('success', 'Task Created Successfully!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request)
    {
        $datas = Lokasi::find($request->id);
        $datas->gedung=$request->gedung;
        $datas->rak=$request->rak;
        $datas->baris=$request->baris;
        $datas->bok=$request->bok;
        $datas->folder=$request->folder;
        $datas->save();
        return redirect('admin/lokasi')->withSuccessUpdate('success', 'Task Created Successfully!');
    }

   
    public function destroy($id)
    {
        $datas = Lokasi::find($id)->delete();
        return redirect('admin/lokasi')->withSuccessDelete('success', 'Task Created Successfully!');
    }
}
