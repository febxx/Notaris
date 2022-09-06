<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaBadansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_badan', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor');
            $table->string('nama');
            $table->date('tanggal')->nullable();
            $table->string('register');
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('dusun')->nullable();
            $table->foreignId('kelurahan_id')->nullable()->constrained('indonesia_villages');
            $table->foreignId('akta_badan_jenis_id')->constrained('akta_badan_jenis');
            $table->foreignId('akta_badan_jenis_sifat_id')->constrained('akta_badan_jenis_sifat');
            $table->foreignId('notaris_id')->constrained('notaris')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('client')->onDelete('cascade')->nullable();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('akta_badans');
    }
}
