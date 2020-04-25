<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_md');
            $table->string('nama_dokumen');
            $table->string('deskripsi');
            $table->string('kurun_waktu');
            $table->string('tingkat_perkembangan');
            $table->string('media_arsip');
            $table->string('kondisi');
            $table->string('file');
            $table->timestamps();
            $table->foreign('id_md')->references('id')->on('j_lokasis')->onDelete('cascade')->update('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumens');
    }
}
