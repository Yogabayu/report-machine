<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cabang_id');
            $table->unsignedBigInteger('machine_id');
            $table->unsignedBigInteger('spareparts_id');
            $table->string('judul');
            $table->string('desc');
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cabang_id')->references('id')->on('cabangs');
            $table->foreign('machine_id')->references('id')->on('machines');
            $table->foreign('spareparts_id')->references('id')->on('spareparts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
