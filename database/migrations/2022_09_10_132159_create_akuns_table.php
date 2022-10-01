<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('debit')->nullable();
            $table->integer('kredit')->nullable();
            $table->date('tanggal');
            $table->string('keterangan');
            $table->foreignId('kategori_akun_id')->constrained('kategori_akun')->onDelete('cascade');
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
        Schema::dropIfExists('akuns');
    }
}
