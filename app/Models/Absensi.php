<?php

namespace App\Models;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'id_siswa',
        'id_user',
        'tanggal',
        'status_absensi',
        'keterangan'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
