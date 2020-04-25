<?php

namespace App\Console\Commands;

use App\Dokumen;
use Illuminate\Console\Command;

class PemusnahanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:pemusnahan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sistem update dokumen/retensi dokumen secara sistem';

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
        $date = date('Y-m-d');
        $tnow = explode('-',$date);
        $datas = Dokumen::join('j_lokasis as jl','jl.id','=','dokumens.id_md')
        ->join('jras as j','j.id','=','jl.id_jra')
        ->select('dokumens.id','dokumens.kurun_waktu','j.sifat_dokumen','j.aktif','j.inaktif')
        ->get();
        foreach ($datas as $data){
            $tdokumen = explode('-',$data->kurun_waktu);
            $dokumenaktif = $tdokumen[0] + $data->aktif;
            $tdokumen = $tdokumen[0] + $data->aktif + $data->inaktif;
            
            if($dokumenaktif < $tnow[0] and $tdokumen>=$tnow[0]){
                $update = Dokumen::find($data->id);
                $update->id_statusd = "2";
                $update->save();
            }
            elseif($tdokumen < $tnow[0]){
                if($data->sifat_dokumen == 'Permanen'){
                    $update = Dokumen::find($data->id);
                    $update->id_statusd = '5';
                    $update->save();
                }elseif($data->sifat_dokumen == 'Musnah'){
                    $update = Dokumen::find($data->id);
                    $update->id_statusd = '3';
                    $update->save();
                }elseif($data->sifat_dokumen == 'Ditinjau Ulang'){
                    $update = Dokumen::find($data->id);
                    $update->id_statusd = '4';
                    $update->save();
                }
                
            }
        }
    }
}
