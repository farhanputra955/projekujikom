<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNabisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nabis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_nabi');
            $table->string('slug');
            $table->text('konten');
            $table->string('foto');
            $table->unsignedBigInteger('id_kisah');
            $table->foreign('id_kisah')->references('id')->on('kisahs')->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('nabis');
    }
}
