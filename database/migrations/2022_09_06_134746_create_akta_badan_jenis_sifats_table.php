<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaBadanJenisSifatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_badan_jenis_sifat', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('akta_badan_jenis_id')->nullable()->constrained('akta_badan_jenis');
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
        Schema::dropIfExists('akta_badan_jenis_sifat');
    }
}
