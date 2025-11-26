<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'reaction_type_id',
        'user_id',
        'session_id',
        'ip_address',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function reactionType()
    {
        return $this->belongsTo(ReactionType::class);
    }
}
