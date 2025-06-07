<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostAttachment extends Model
{
     protected $fillable = [
        'storage_path',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
