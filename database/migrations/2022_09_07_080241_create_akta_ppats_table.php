<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaPpatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_ppat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('register');
            $table->date('tanggal')->nullable();
            $table->foreignId('akta_ppat_jenis_id')->constrained('akta_ppat_jenis')->onDelete('cascade');
            $table->foreignId('notaris_id')->constrained('notaris')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade')->nullable();
            $table->foreignId('client_id')->constrained('client')->onDelete('cascade')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('dusun')->nullable();
            $table->foreignId('kelurahan_id')->nullable()->constrained('indonesia_villages');
            $table->integer('luas_tanah')->nullable();
            $table->integer('luas_bangunan')->nullable();
            $table->integer('nilai_pengalihan')->nullable();
            $table->string('nop')->nullable();
            $table->year('njop_tahun')->nullable();
            $table->integer('njop_tanah')->nullable();
            $table->integer('njop_bangunan')->nullable();
            $table->date('ssp_tanggal')->nullable();
            $table->integer('ssp_nilai')->nullable();
            $table->date('sspd_tanggal')->nullable();
            $table->integer('sspd_nilai')->nullable();
            $table->date('ssb_tanggal')->nullable();
            $table->integer('ssb_nilai')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('akta_ppat');
    }
}
