<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;

    protected $table = 'replies';
    public $timestamps = false;
    protected $guarded = [];

    public function getPost()
    {
        return $this->belongsTo(Posts::class, 'post_id', 'id');
    }

    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
