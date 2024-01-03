<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getThumbnail()
    {
        return $this->thumbnail == '' || strlen($this->thumbnail) == 0 ? 'assets/img/blog/blog-default.jpg' : 'assets/img/' . $this->thumbnail;
    }

    public static function latestBlog($limit){
        return self::latest()->take($limit)->get();
    }

    // Relations
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
