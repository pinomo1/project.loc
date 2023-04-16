<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $timestamps = false;
    protected $guarded = [];

    public function getCategory()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function getReplies()
    {
        return $this->hasMany(Replies::class, 'post_id', 'id');
    }

    public function countReplies()
    {
        return $this->getReplies()->count();
    }
}
