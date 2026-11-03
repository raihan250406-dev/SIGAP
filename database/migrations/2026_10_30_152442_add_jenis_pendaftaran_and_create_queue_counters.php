<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wajib_pajaks', function (Blueprint $table) {
            $table->string('jenis_pendaftaran', 50)
                ->default('PU TAHUNAN')
                ->after('no_hp');
        });

        Schema::create('queue_counters', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 1)->unique();
            $table->unsignedInteger('nomor_terakhir')->default(0);
            $table->timestamps();
        });

        // Siapkan penghitung A dan B.
        DB::table('queue_counters')->insert([
            [
                'kode' => 'A',
                'nomor_terakhir' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'B',
                'nomor_terakhir' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Hindari nomor bentrok dengan antrean lama.
        $nomorTerakhir = ['A' => 0, 'B' => 0];

        foreach (DB::table('wajib_pajaks')->pluck('no_antrian') as $nomor) {
            if (preg_match('/^([AB])-(\d+)$/i', (string) $nomor, $match)) {
                $kode = strtoupper($match[1]);
                $angka = (int) $match[2];

                $nomorTerakhir[$kode] = max(
                    $nomorTerakhir[$kode],
                    $angka
                );
            }
        }

        foreach ($nomorTerakhir as $kode => $angka) {
            DB::table('queue_counters')
                ->where('kode', $kode)
                ->update([
                    'nomor_terakhir' => $angka,
                    'updated_at' => now(),
                ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('queue_counters');

        Schema::table('wajib_pajaks', function (Blueprint $table) {
            $table->dropColumn('jenis_pendaftaran');
        });
    }
};