<?php

namespace App\Models\BlogModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'blog_category_id', 'author_id', 'title', 'slug', 'excerpt',
        'content', 'featured_image', 'tags', 'status', 'views', 'published_at',
    ];

    protected $casts = [
        'tags'         => 'array',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author()
    {
        return $this->belongsTo(\App\Models\User::class, 'author_id');
    }

    public function seo()
    {
        return $this->hasOne(BlogSEO::class, 'blog_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}