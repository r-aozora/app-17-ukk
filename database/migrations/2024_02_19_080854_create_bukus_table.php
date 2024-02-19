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
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('kategori')->unique();
            $table->timestamps();
        });

        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('judul')->unique();
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahun');
            $table->text('deskripsi');
            $table->string('gambar')->nullable()->default('/images/buku.png');
            $table->unsignedBigInteger('stok');
            $table->unsignedBigInteger('pinjam')->nullable();
            $table->foreignId('kategori_id')->constrained('kategori')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('buku');
    }
};
