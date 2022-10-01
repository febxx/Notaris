<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->integer('nominal');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->foreignId('notaris_id')->constrained('notaris')->onDelete('cascade');
            $table->foreignId('akta_ppat_id')->constrained('akta_ppat')->onDelete('cascade')->nullable();
            $table->foreignId('akta_notaris_id')->constrained('akta_notaris')->onDelete('cascade')->nullable();
            $table->foreignId('akta_badan_id')->constrained('akta_badan')->onDelete('cascade')->nullable();
            $table->foreignId('kategori_akun_id')->constrained('kategori_akun')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
