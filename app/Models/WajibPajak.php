<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WajibPajak extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nopol',
        'nama',
        'no_hp',
        'jenis_pendaftaran',
        'no_antrian',
        'tanggal_jatuh_tempo',
        'fungsi',
        'titik_layanan',
        'status',
        'foto_stnk',
        'foto_ktp',
    ];

    protected $casts = [
        'tanggal_jatuh_tempo' => 'date',
    ];

    /**
     * Setiap data wajib pajak dimiliki oleh satu user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}