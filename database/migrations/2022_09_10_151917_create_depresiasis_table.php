<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepresiasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depresiasi', function (Blueprint $table) {
            $table->id();
            $table->integer('nominal');
            $table->string('keterangan');
            $table->foreignId('akun_id')->constrained('akun')->onDelete('cascade');
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
        Schema::dropIfExists('depresiasi');
    }
}
