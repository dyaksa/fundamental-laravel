<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    //make own function in model
    public function scopeLatestPost()
    {
        return $this->latest()->first();
    }

    public function scopeCreatedAsc()
    {
        return $this->orderBy('created_at', 'asc')->get();
    }

    public function scopeCount()
    {
        $post = $this->all();
        return $post->count();
    }
}
