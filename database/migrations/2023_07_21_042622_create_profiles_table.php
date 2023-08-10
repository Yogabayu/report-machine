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
            $table->integer('level')->default(3)->comment('1=superadmin, 2=admin, 3=teknisi');
            $table->integer('status')->default(1)->comment('0=nonaktif, 1=aktif');
            $table->string('alamat');
            $table->integer('umur');
            $table->string('pendidikan');
            $table->string('jenis_kelamin')->comment('l=laki-laki, p=perempuan');
            $table->string('telp');
            $table->integer('mariage')->default(3)->comment('1=menikah, 2=belum menikah,3=undefined');
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
