<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            // Drop kolom lama hanya jika memang ada
            if (Schema::hasColumn('nilais', 'jenis_nilai')) {
                $table->dropColumn('jenis_nilai');
            }

            if (Schema::hasColumn('nilais', 'nilai')) {
                $table->dropColumn('nilai');
            }

            if (Schema::hasColumn('nilais', 'keterangan')) {
                $table->dropColumn('keterangan');
            }

            // Tambah kolom pekan
            $table->unsignedSmallInteger('pekan_1')->nullable();
            $table->unsignedSmallInteger('pekan_2')->nullable();
            $table->unsignedSmallInteger('pekan_3')->nullable();
            $table->unsignedSmallInteger('pekan_4')->nullable();
            $table->decimal('rata_rata', 5, 2)->nullable();

            // Tambahkan UNIQUE baru
            $table->unique(['siswa_id', 'jadwal_id'], 'nilais_siswa_jadwal_unique');

        });
    }

    public function down(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            // Drop unique baru
            $table->dropUnique('nilais_siswa_jadwal_unique');

            // Drop kolom pekan
            $table->dropColumn([
                'pekan_1', 'pekan_2', 'pekan_3', 'pekan_4', 'rata_rata'
            ]);

            // Kembalikan kolom lama
            $table->string('jenis_nilai')->nullable();
            $table->unsignedSmallInteger('nilai')->nullable();
            $table->string('keterangan')->nullable();
        });
    }
};
