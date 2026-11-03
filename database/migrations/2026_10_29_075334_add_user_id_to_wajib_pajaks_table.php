<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahkan kolom user_id tanpa mengganggu data lama.
        Schema::table('wajib_pajaks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
        });

        // Hubungkan seluruh data lama ke akun Admin SIGAP (ID 2).
        if (!DB::table('users')->where('id', 2)->exists()) {
            throw new RuntimeException(
                'Akun Admin SIGAP dengan ID 2 tidak ditemukan.'
            );
        }

        DB::table('wajib_pajaks')
            ->whereNull('user_id')
            ->update(['user_id' => 2]);

        // Pastikan tidak ada data tanpa pemilik sebelum memasang FK.
        if (DB::table('wajib_pajaks')->whereNull('user_id')->exists()) {
            throw new RuntimeException(
                'Masih ada data wajib pajak tanpa user_id.'
            );
        }

        // Pasang foreign key ke tabel users.
        Schema::table('wajib_pajaks', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('wajib_pajaks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
