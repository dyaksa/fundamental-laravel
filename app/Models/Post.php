<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    //digunakan ketika inputan itu bersifat public
    protected $fillable = ['title', 'slug', 'body'];

    //digunakan ketika inputan bersifat pribadi
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

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
