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
        Schema::table('nilais', function (Blueprint $table) {
        if (!Schema::hasColumn('nilais', 'jadwal_id')) {
            $table->foreignId('jadwal_id')
                  ->after('siswa_id')
                  ->constrained('jadwals')
                  ->onDelete('cascade');
        }
    });
}

public function down()
{
    Schema::table('nilais', function (Blueprint $table) {
        $table->dropForeign(['jadwal_id']);
        $table->dropColumn('jadwal_id');
    });
}
};
