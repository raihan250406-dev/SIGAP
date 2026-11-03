
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
        Schema::create('wajib_pajaks', function (Blueprint $table) {
            $table->id();

            $table->string('nopol', 20)->index();
            $table->string('nama', 100);
            $table->string('no_hp', 20)->nullable();
            $table->string('no_antrian', 20)->index();

            $table->date('tanggal_jatuh_tempo');

            $table->string('fungsi')
                ->default('Wajib Pribadi');

            $table->enum('titik_layanan', [
                'SAMSAT Induk',
                'SAMSAT Keliling',
                'PATEN',
                'BUDIMAN',
            ]);

            $table->enum('status', ['MS', 'TMS'])->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wajib_pajaks');
    }
};
