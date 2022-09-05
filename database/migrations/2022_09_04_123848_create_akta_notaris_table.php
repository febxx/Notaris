<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaNotarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_notaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nomor')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('register');
            $table->foreignId('akta_notaris_jenis_id')->constrained('akta_notaris_jenis')->onDelete('cascade');
            $table->foreignId('notaris_id')->constrained('notaris')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade')->nullable();
            $table->foreignId('client_id')->constrained('client')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('akta_notaris');
    }
}
