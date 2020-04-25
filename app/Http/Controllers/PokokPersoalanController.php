<?php

namespace App\Http\Controllers;

use App\PokokPersoalan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PokokPersoalanController extends Controller
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
        $datas = PokokPersoalan::all();
        return view('admin.jenisDokumen.pokokPersoalan',compact('datas'));
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
        $datas = new PokokPersoalan();
        $datas->kode_pp = $request->kode;
        $datas->pokok_persoalan = $request->nama;
        $datas->save();
        return redirect('admin/pokok-persolanan')->withSuccess('success', 'Task Created Successfully!');
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
        $datas = PokokPersoalan::find($request->id);
        $datas->kode_pp = $request->kode;
        $datas->pokok_persoalan = $request->nama;
        $datas->save();
        return redirect('admin/pokok-persolanan')->withSuccessUpdate('success', 'Task Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = PokokPersoalan::find($id)->delete();
        return redirect('admin/pokok-persolanan')->withSuccessDelete('success', 'Task Created Successfully!');
    }
}
