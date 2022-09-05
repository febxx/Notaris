<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaNotarisPihaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_notaris_pihak', function (Blueprint $table) {
            $table->id();
            $table->string('selaku')->nullable();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('dusun')->nullable();
            $table->foreignId('kelurahan_id')->nullable()->constrained('indonesia_villages');
            $table->string('npwp')->nullable();
            $table->string('nik')->nullable();
            $table->foreignId('akta_notaris_id')->constrained('akta_notaris')->onDelete('cascade');
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
        Schema::dropIfExists('akta_notaris_pihak');
    }
}
