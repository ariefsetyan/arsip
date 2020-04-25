<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('j_lokasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lokasi');
            $table->unsignedBigInteger('id_pp');
            $table->unsignedBigInteger('id_ap');
            $table->unsignedBigInteger('id_p');
            $table->unsignedBigInteger('id_jra');
            $table->timestamps();
            $table->foreign('id_lokasi')->references('id')->on('lokasis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pp')->references('id')->on('pokok_persoalans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ap')->references('id')->on('anak_persoalans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_p')->references('id')->on('perihals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jra')->references('id')->on('jras')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('j_lokasis');
    }
}
