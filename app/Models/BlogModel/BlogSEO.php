<?php

namespace App\Models\BlogModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogSEO extends Model
{
    use HasFactory;

    protected $table = 'blog_seo';
    protected $fillable = [
        'blog_id', 'meta_title', 'meta_description', 'meta_keywords', 'og_image', 'canonical_url',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}