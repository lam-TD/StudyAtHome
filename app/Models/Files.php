<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Post;

class Files extends Model
{
    protected $fillable = [
        'file_name',
        'user_id',
        'post_id',
        'file_name_origin',
        'file_size',
    ];

    public function user()
    {
        return $this->belongsto(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsto(Post::class, 'post_id');
    }
}
