<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'author_id',
        'category_id',
        'post_type',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_media_id',
        'video_url',
        'view_count',
        'react_enabled',
        'comments_enabled',
        'status',
        'published_at',
    ];

    protected $casts = [
        'react_enabled' => 'boolean',
        'comments_enabled' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function featuredMedia()
    {
        return $this->belongsTo(Media::class, 'featured_media_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function postReactions()
    {
        return $this->hasMany(PostReaction::class);
    }

    public function getFeaturedImageUrlAttribute(): ?string
    {
        return $this->featuredMedia?->url;
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->whereNotNull('published_at');
    }
}
