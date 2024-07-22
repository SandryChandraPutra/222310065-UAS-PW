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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas')->onDelete('cascade');
            $table->foreignId('id_divisi')->constrained('divisis')->onDelete('cascade');
            $table->string('judul_tiket', 100);
            $table->string('attachment', 255)->nullable();
            $table->text('deskripsi');
            $table->string('priority', 10);
            $table->timestamp('tanggal')->useCurrent();
            $table->string('status')->default('belum selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
