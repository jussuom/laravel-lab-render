<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function websites()
    {
        return $this->belongsToMany(Website::class, 'bookmark_category');
    }
}
