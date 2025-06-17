<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kategori_buku_id');
            $table->string('penulis');
            $table->year('tahun_terbit');
            $table->timestamps();

            // FOREIGN KEY constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kategori_buku_id')->references('id')->on('kategori_buku')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['kategori_buku_id']);
        });

        Schema::dropIfExists('bukus');
    }
};
