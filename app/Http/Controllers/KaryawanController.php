<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $datas = User::all();
        return view('admin.karyawan.formKaryawan',compact('datas'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $nohp= $request->telp;
        $nohp = str_replace(" ","",$nohp);
        if(!preg_match('/[^+0-9]/',trim($nohp))){
            if(substr(trim($nohp), 0, 3)=='+62'){
                $hp = '62'.substr(trim($nohp), 1);
            }
            elseif(substr(trim($nohp), 0, 1)=='0'){
                $hp = '62'.substr(trim($nohp), 1);
            }
        }
        // dd($hp);
        $datas = new User();
        $datas->nip = $request->nip;
        $datas->name = $request->nama;
        $datas->email = $request->email;
        $datas->password = bcrypt('123456');
        $datas->telp = $hp;
        $datas->alamat = $request->alamat;
        $datas->jkl = $request->jkl;
        $datas->is_admin = '0';
        $datas->save();
        // dd($datas);
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
