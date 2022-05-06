<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $fillable = ['title','content','image','status','category_blog_id'];

    public function categoryBlog()
    {
        return $this->belongsTo(CategoryBlog::class);
    }
}
