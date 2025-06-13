<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('penulis');
            $table->year('tahun_terbit');
            $table->timestamp('created_at');
            $table->timestamps('upadate_at');

            //Foreign key constraint
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');

        Schema::table('bukus', function (Blueprint $table) {
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

};
