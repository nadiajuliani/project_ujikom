<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eskuls', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('nama_eskul')->unique();
            $table->string('nama_pembina')->nullable();
            $table->string('kontak_pembina')->nullable();
            $table->string('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eskuls');
    }
};
