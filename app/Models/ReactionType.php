<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReactionType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'emoji',
        'label',
    ];

    public function postReactions()
    {
        return $this->hasMany(PostReaction::class);
    }
}
