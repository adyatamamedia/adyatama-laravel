<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'nama_ortu',
        'no_hp',
        'email',
        'asal_sekolah',
        'dokumen_kk',
        'dokumen_akte',
        'pas_foto',
        'foto_ijazah',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
