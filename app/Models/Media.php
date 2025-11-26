<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory;
    use SoftDeletes;

    const UPDATED_AT = null;

    protected $fillable = [
        'origin_post_id',
        'type',
        'path',
        'caption',
        'meta',
        'order_num',
        'filesize',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function getUrlAttribute(): ?string
    {
        return media_url($this->path ?? null);
    }

    public function isNotEmpty(): bool
    {
        return !empty($this->path) && file_exists(public_path($this->path));
    }
}
