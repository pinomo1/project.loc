<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public $timestamps = false;
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(posts::class, 'category_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id', 'id');
    }
}
