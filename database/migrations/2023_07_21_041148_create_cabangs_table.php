<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provinsi_id');
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('desa_id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('provinsi_id')->references('id')->on('indonesia_provinces');
            $table->foreign('kota_id')->references('id')->on('indonesia_cities');
            $table->foreign('kecamatan_id')->references('id')->on('indonesia_districts');
            $table->foreign('desa_id')->references('id')->on('indonesia_villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabangs');
    }
}
