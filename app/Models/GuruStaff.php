<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuruStaff extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nip',
        'nama_lengkap',
        'jabatan',
        'bidang',
        'email',
        'no_hp',
        'foto',
        'status',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getPhotoUrlAttribute(): ?string
    {
        return media_url($this->foto ?? null);
    }
}
