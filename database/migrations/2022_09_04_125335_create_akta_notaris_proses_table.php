<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaNotarisProsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_notaris_proses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akta_notaris_jenis_proses_id')->constrained('akta_notaris_jenis_proses')->onDelete('cascade');
            $table->foreignId('akta_notaris_id')->constrained('akta_notaris')->onDelete('cascade');
            $table->string('keterangan')->nullable();
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akta_notaris_proses');
    }
}
