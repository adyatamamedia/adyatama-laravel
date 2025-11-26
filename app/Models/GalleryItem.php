<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'gallery_id',
        'media_id',
        'type',
        'path',
        'caption',
        'order_num',
    ];

    protected $casts = [
        'order_num' => 'integer',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        return media_url($this->path ?? null);
    }
}
