<?php

namespace App\Http\Controllers;

use App\AnakPersoalan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnakPersoalanController extends Controller
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
        $datas = AnakPersoalan::all();
        return view('admin.jenisDokumen.anakPersoalan',compact('datas'));
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
        $datas = new AnakPersoalan();
        $datas->kode_ap = $request->kode;
        $datas->anak_persoalan = $request->nama;
        $datas->save();
        return redirect('admin/anak-persoalan')->withSuccess('success', 'Task Created Successfully!');
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
    public function update(Request $request)
    {
        $datas = AnakPersoalan::find($request->id);
        $datas->kode_Ap = $request->kode;
        $datas->anak_persoalan = $request->nama;
        $datas->save();
        return redirect('admin/anak-persoalan')->withSuccessUpdate('success', 'Task Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = AnakPersoalan::find($id)->delete();
        return redirect('admin/anak-persoalan')->withSuccessDelete('success', 'Task Created Successfully!');
    }
}
