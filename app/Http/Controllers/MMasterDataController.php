<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\PokokPersoalan;
use App\AnakPersoalan;
use App\Perihal;
use App\Jra;
use App\JLokasi;
use RealRashid\SweetAlert\Facades\Alert;

class MMasterDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $lokasis = Lokasi::all();
        $dataPP = PokokPersoalan::all();
        $dataAP = AnakPersoalan::all();
        $dataP = Perihal::all();
        $dataJra = Jra::all();
        $datas = JLokasi::join('lokasis as l', 'l.id','=','j_lokasis.id_lokasi')
        ->join('pokok_persoalans as pp', 'pp.id','=','j_lokasis.id_pp')
        ->join('anak_persoalans as ap', 'ap.id','=','j_lokasis.id_ap')
        ->join('perihals as p', 'p.id','=','j_lokasis.id_p')
        ->join('jras as j', 'j.id','=','j_lokasis.id_jra')
        ->get();
        // dd($datas);
        return view('admin.manajemenMasterData',compact('lokasis','dataPP','dataAP','dataP','dataJra','datas'));
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
        $datas = new JLokasi();
        $datas->id_lokasi = $request->lokasi;
        $datas->id_pp = $request->pp;
        $datas->id_ap = $request->ap;
        $datas->id_p = $request->p;
        $datas->id_jra = $request->Ja;
        // dd($datas);
        $datas->save();
        return redirect('admin/manajemen');

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
        $datas = JLokasi::find($id)->delete();
        return redirect('admin/manajemen');
    }
}
