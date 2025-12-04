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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('jadwal_id')->constrained('jadwals')->onDelete('cascade'); 
            $table->string('jenis_nilai'); 
            $table->unsignedSmallInteger('nilai'); // Nilai 0-100
            $table->string('keterangan')->nullable();
            $table->timestamps();

            // mencegah input nilai ganda untuk siswa, jadwal, dan jenis nilai yang sama
            $table->unique(['siswa_id', 'jadwal_id', 'jenis_nilai']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
