<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaNotarisJenisProsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_notaris_jenis_proses', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi');
            $table->integer('jangka_waktu')->nullable();
            $table->string('peringatkan')->nullable();
            $table->foreignId('notaris_id')->constrained('notaris')->onDelete('cascade');
            $table->foreignId('akta_notaris_jenis_id')->constrained('akta_notaris_jenis')->onDelete('cascade');
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
        Schema::dropIfExists('akta_notaris_jenis_proses');
    }
}
