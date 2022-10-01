<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratBawahTangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_bawah_tangan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_urut')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('jenis')->nullable();
            $table->foreignId('surat_sifat_id')->constrained('surat_sifat')->onDelete('cascade');
            $table->foreignId('notaris_id')->constrained('notaris')->onDelete('cascade');
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
        Schema::dropIfExists('surat_bawah_tangans');
    }
}
