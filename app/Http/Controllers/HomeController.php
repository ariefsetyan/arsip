<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('karyawan/pengajuan');
    }

    public function adminHome()
    {
        
        // return view('admin.adminHome');
        return redirect('admin/cari-dokumen');
    }
    public function coba(){
        
    }
    
}
