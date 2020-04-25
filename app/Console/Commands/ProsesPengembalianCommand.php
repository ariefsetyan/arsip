<?php

namespace App\Console\Commands;

use App\Peminjaman;
use Illuminate\Console\Command;

class ProsesPengembalianCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:pengembalian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update data peminjaman online';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tglnow=date('Y-m-d');
        $datas = Peminjaman::all();
        foreach($datas as $data){
            if($tglnow > $data->tgl_kembli){
                $update = Peminjaman::find($data->id)->where('id_status','5')->get();
                $data->id_status = 2;
                $data->save();
            }
        }
    }
}
