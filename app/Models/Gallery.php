<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'description',
        'extracurricular_id',
        'view_count',
        'status',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class);
    }

    public function items()
    {
        return $this->hasMany(GalleryItem::class)->orderBy('order_num');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
