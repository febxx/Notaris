<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratBawahTanganPihaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_bawah_tangan_pihak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_bawah_tangan_id')->constrained('surat_bawah_tangan')->onDelete('cascade');
            $table->string('selaku')->nullable();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('dusun')->nullable();
            $table->foreignId('kelurahan_id')->nullable()->constrained('indonesia_villages');
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
        Schema::dropIfExists('surat_bawah_tangan_pihaks');
    }
}
