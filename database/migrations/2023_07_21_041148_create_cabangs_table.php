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
            $table->char('provinsi_code',2);
            $table->char('kota_code',4);
            $table->char('kecamatan_code',7);
            $table->char('desa_code',10);
            $table->string('nama');
            $table->string('alamat');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('provinsi_code')->references('code')->on('indonesia_provinces');
            $table->foreign('kota_code')->references('code')->on('indonesia_cities');
            $table->foreign('kecamatan_code')->references('code')->on('indonesia_districts');
            $table->foreign('desa_code')->references('code')->on('indonesia_villages');
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
