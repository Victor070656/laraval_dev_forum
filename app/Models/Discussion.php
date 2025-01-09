<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasUuids;
    //

    protected $fillable = [
        "user_id",
        "title",
        "body"
    ];

    public function comments()
    {
        $this->hasMany(Comment::class);
    }
}
