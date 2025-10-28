<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable = ['title', 'url', 'user_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'bookmark_category');
    }
}
