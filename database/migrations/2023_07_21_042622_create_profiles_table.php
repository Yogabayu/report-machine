<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cabang_id');
            $table->string('nama');
            $table->integer('level');
            $table->integer('status');
            $table->string('alamat');
            $table->integer('umur');
            $table->string('pendidikan');
            $table->string('jenis_kelamin');
            $table->string('telp');
            $table->string('mariage');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cabang_id')->references('id')->on('cabangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
