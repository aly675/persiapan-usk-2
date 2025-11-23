<?php

namespace App\Models;

use App\Models\Absensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nama',
        'nis',
        'jurusan',
        'kelas'
    ];

    public function absen(): HasMany{
        return $this->hasMany(Absensi::class, 'id_siswa');
    }
}
