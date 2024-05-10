<?php

namespace App\Models;

use App\Traits\Eloquent\HasLive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory, HasLive;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
